<?php

namespace App\Http\Controllers;

use App\Config;
use App\Country;
use App\Http\Requests\UploadPropertiesXMLRequest;
use App\State;
use Illuminate\Http\Request;
use App\Properties;
use App\Owner;
use App\User;
use App\Flat;
use App\Ficha;
use App\Home;
use App\Office;
use App\CountryHome;
use App\Image;
use Exception;
use App\Land;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\MailService;
use App\Jobs\ProccessDonwnloadImage;
use App\Promotion;
use Carbon;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use PDF;


class PropertiesController extends Controller
{


    //protected MailService $mailService;

    public function __construct(MailService $mailService) {
            $this->mailService  = $mailService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $owner      = Auth::user()->owner;
        $properties = $owner->properties->sortByDesc('updated_at');
        // dd($properties);
        for($i=0; $i<count($properties); $i++){
            $properties[$i]->calculated_commission = $properties[$i]->price * $properties[$i]->agency_commissions*0.01;
            if(Auth::user()->owner->type=='agente' && $properties[$i]->calculated_commission<2000)
                $properties[$i]->calculated_commission = 2000;
            elseif(Auth::user()->owner->type!='agente' && $properties[$i]->calculated_commission<3000)
                $properties[$i]->calculated_commission = 3000;

            $properties[$i]->calculated_commission = number_format($properties[$i]->calculated_commission , 2, ',', '.').'€';
            $properties[$i]->agency_commissions = number_format(($properties[$i]->agency_commissions), 2, ',', '.').'%';
            $properties[$i]->price = number_format(($properties[$i]->price), 0, ',', '.');

            if($properties[$i]->propertyable_type == "App\\Promotion"){
                $properties[$i]->agency_commissions = $properties[$i]->propertyable->promotion_agency_commissions;
                $properties[$i]->calculated_commission = $properties[$i]->propertyable->promotion_agency_commissions;
            }

            if($properties[$i]->operation=='rent'){
                $properties[$i]->agency_commissions = 'Ver detalle';
                $properties[$i]->calculated_commission = 'Ver detalle';
            }

        }
        return view('backend.owners.my_properties', [
            'owner'      => $owner,
            'properties' => $properties
        ]);
    }

    public function properties()
    {
        $properties = Properties::paginate(15);

        return view('backend.owners.my_properties', ['properties' => $properties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owner     = Auth::user()->owner;
        $countries = Country::all();  // Only Spain by now, 1 record
        $minimum_commission = Auth::user()->owner->type=='agente' ? Config::minimum_commission_agente() : Config::minimum_commission();
        return view(
            'properties.create_property',
            [
                'owner'              => $owner,
                'countries'          => $countries,
                'minimum_commission' => $minimum_commission,
            ]
        );
    }

    public function propertyDetail($id)
    {
        try {
            $property = Properties::findOrFail($id);
            $property_subtype = $property->propertyable;
            return view('properties.detail_property', ['property' => $property, 'property_subtype' => $property_subtype]);
        } catch (Exception $e) {
            if (config('app.debug')) {
                return redirect()->back()->withErrors($e->getMessage());
            }
            return redirect()->back()->withErrors(["No se puede mostrar esta propiedad"]);
        }
    }


    public function filterProperties(Request $filter) {
        try {
            $propertyId = (integer)$filter->input('property_id', -1);
           /* $exp        = explode(";", $filter->type);
            $table_name = $exp[0];
            $class_name = $exp[1];*/
            $query      = [];


            //si es una promocion, no tenemos encuenta este precio, sino el rango de precios de la promocion
           /* if ($filter->min_price != null  && $filter->type!='Promotion') {
                //dd($filter->type, "entra");
                $query = array_merge($query, [['price', '>=', $filter->min_price]]);
            }
            if ($filter->max_price != null  && $filter->type!='Promotion') {
                $query = array_merge($query, [['price', '<=', $filter->max_price]]);
            }
*/
           /* if ($filter->bathrooms != null) {
                $query = array_merge($query, [
                    ['flats.bathrooms', '=', $filter->bathrooms],
                    ['country_homes.bathrooms', '=', $filter->bathrooms],
                    ['homes.bathrooms', '=', $filter->bathrooms],
                    ['offices.bathrooms', '=', $filter->bathrooms]
                    ]);
            }*/


            if ($filter->operation != null) {
                $query = array_merge($query, [['operation', '=', $filter->operation]]);
            }

            if ($filter->min_meters != null) {
                $query = array_merge($query, [['useful_meters', '>=', $filter->min_meters]]);
            }
            if ($filter->max_meters != null) {
                $query = array_merge($query, [['useful_meters', '<=', $filter->max_meters]]);
            }

            //filtrar por comunidad
            if (
                $filter->location_state_id != null && $filter->location_state_id != -1
                && $filter->location_state_id != "Comunidad"
            ) {
                $query = array_merge($query, [['locations.state_id', $filter->location_state_id]]);
            }

            //filtrar por comunidad
            if (
                $filter->location_county_id != null && $filter->location_county_id != -1
                && $filter->location_county_id != "Provincia"
            ) {
                $query = array_merge($query, [['locations.county_id', $filter->location_county_id]]);
            }

            //array con todos los id de las ciudades seleccionadas
            $array_city = null;
            //filtrar por ciudad
            if (
                $filter->location_city_id != null && $filter->location_city_id != -1
                && $filter->location_city_id != "Provincia"
            ) {
                $array_city = [];
                foreach ($filter->location_city_id as $city_id) {
                    array_push($array_city, $city_id);
                }
            }

            //ultimo historico de todas las propiedades
            $last_historical = DB::table('historical_lines')
            ->select(DB::raw('MAX(historical_lines.id) as max_historical_id'), 'historical_lines.property_id as historical_property_id')
            ->groupBy('historical_lines.property_id');

            $bedrooms = $filter->bedrooms;
            $bathrooms = $filter->bathrooms;
            $min_size = $filter->min_size;
            $max_size = $filter->max_size;
            $property_status = $filter->property_status;
            //$property_min_price = $filter->min_price;
            //$property_max_price = $filter->max_price;

            $properties = Properties::select('properties.*')
                //->select('properties.*', 'owners.name', 'sub.*', 'url as img_url', 'locations.*', 'counties.name as county_name')
                //->leftJoin('commercial_properties', 'properties.propertyable_id', '=', 'commercial_properties.id')
                ->leftJoin('commercial_properties', function($join) use ($bathrooms){
                    $join->on('commercial_properties.id', '=', 'properties.propertyable_id')
                        ->where('properties.propertyable_type', '=', 'App\\CommercialProperty');
                })
                ->leftJoin('flats', function($join) use ($bathrooms){
                    $join->on('flats.id', '=', 'properties.propertyable_id')
                    ->where('properties.propertyable_type', '=', 'App\\Flat');
                })
                ->leftJoin('homes', function($join){
                    $join->on('homes.id', '=', 'properties.propertyable_id')
                        ->where('properties.propertyable_type', '=', 'App\\Home');
                })
                ->leftJoin('country_homes', function($join){
                    $join->on('country_homes.id', '=', 'properties.propertyable_id')
                        ->where('properties.propertyable_type', '=', 'App\\CountryHome');
                })
                ->leftJoin('lands', function($join){
                    $join->on('lands.id', '=', 'properties.propertyable_id')
                        ->where('properties.propertyable_type', '=', 'App\\Land');
                })
                ->leftJoin('offices', function($join){
                    $join->on('offices.id', '=', 'properties.propertyable_id')
                        ->where('properties.propertyable_type', '=', 'App\\Office');
                })
                ->leftJoin('parking_spaces', function($join){
                    $join->on('parking_spaces.id', '=', 'properties.propertyable_id')
                        ->where('properties.propertyable_type', '=', 'App\\ParkingSpace');
                })
                ->leftJoin('storage_rooms', function($join){
                    $join->on('storage_rooms.id', '=', 'properties.propertyable_id')
                        ->where('properties.propertyable_type', '=', 'App\\StorageRoom');
                })
                ->leftJoin('promotions', function($join){
                    $join->on('promotions.id', '=', 'properties.propertyable_id')
                        ->where('properties.propertyable_type', '=', 'App\\Promotion');
                })
                ->leftJoin('locations', 'properties.id', '=', 'locations.locationable_id')
                //añadimos la tabla imagenes para obtener la url
                ->leftJoin('images', 'images.property_id', '=', 'properties.id')
                ->leftJoin('counties', 'locations.county_id', '=', 'counties.id')
                ->leftJoin('owners', 'owners.id', '=', 'properties.owner_id')
                //filtrar por status validada
                ->joinSub($last_historical, 'last_historical', function ($join) {
                    $join->on('last_historical.historical_property_id', '=', 'properties.id');
                })
                ->join('historical_lines', 'historical_lines.id', '=', 'last_historical.max_historical_id')
                ->where('historical_lines.status_id', '=', 2)
                ->where('locations.locationable_type', 'App\\Properties');


            if ($filter->min_price != null) {
                //dd($filter->type, "entra");
                //$query = array_merge($query, [['price', '>=', $filter->min_price]]);
                $min_price = $filter->min_price;
                $properties = $properties->where(function ($query) use ($min_price) {
                    $query
                        ->orWhere('properties.price', '>=', $min_price)
                        ->orWhere(function($query) use ($min_price) {
                            $query->where('promotions.promotion_price_max', '>=', $min_price);})

                        ;
                });
            }

            if ($filter->max_price != null) {
                //dd($filter->type, "entra");
                //$query = array_merge($query, [['price', '>=', $filter->min_price]]);
                $max_price = $filter->max_price;
                $properties = $properties->where(function ($query) use ($max_price) {
                    $query
                        ->orWhere('properties.price', '<=', $max_price)
                        ->orWhere(function($query) use ($max_price) {
                            $query->where('promotions.promotion_price_min', '<=', $max_price);})

                        ;
                });
            }

            if($bathrooms!=null){
                $properties = $properties->where(function ($query) use ($bathrooms) {
                    $query
                        ->orWhere('country_homes.bathrooms', '=', $bathrooms)
                        ->orWhere('flats.bathrooms', '=', $bathrooms)
                        ->orWhere('homes.bathrooms', '=', $bathrooms)
                        ->orWhere('offices.bathrooms', '=', $bathrooms)
                        ->orWhere(function($query) use ($bathrooms) {
                            $query->where('promotions.promotion_bathrooms_min', '<=', $bathrooms)
                                    ->where('promotions.promotion_bathrooms_max', '>=', $bathrooms);})

                        ;
                });
            }

            if($bedrooms!=null){
                $properties = $properties->where(function ($query) use ($bedrooms) {
                    $query->orWhere('country_homes.bedrooms', '=', $bedrooms)
                        ->orWhere('flats.bedrooms', '=', $bedrooms)
                        ->orWhere('homes.bedrooms', '=', $bedrooms)
                        //caso especial para promociones (rango de habitaciones)
                        ->orWhere(function($query) use ($bedrooms) {
                            $query->where('promotions.promotion_bedrooms_min', '<=', $bedrooms)
                                    ->where('promotions.promotion_bedrooms_max', '>=', $bedrooms);})
                        ;
                });
            }

            if($min_size!=null){
                $properties = $properties->where(function ($query) use ($min_size) {
                    $query->orWhere('country_homes.built_meters', '>=', $min_size)
                        ->orWhere('flats.built_meters', '>=', $min_size)
                        ->orWhere('homes.built_meters', '>=', $min_size)
                        ->orWhere('lands.meters', '>=', $min_size)
                        ->orWhere('offices.built_meters', '>=', $min_size)
                        ;
                });
            }

            if($max_size!=null){
                $properties = $properties->where(function ($query) use ($max_size) {
                    $query->orWhere('country_homes.built_meters', '<=', $max_size)
                        ->orWhere('flats.built_meters', '<=', $max_size)
                        ->orWhere('homes.built_meters', '<=', $max_size)
                        ->orWhere('lands.meters', '<=', $max_size)
                        ->orWhere('offices.built_meters', '<=', $max_size)
                        ;
                });
            }

            if($property_status!=null){
                $properties = $properties->where('properties.property_status', $property_status);
            }


                //
            // Althought we have an ID (a simple findOrFail), It has to be ACTIVE
            //
           /*    $properties = $properties->where('properties.id', $propertyId);
            }*/
//dd($properties->toSql(), $properties->getBindings());
                ///filtramos las propiedades que tienen esta referencia
                //no aplicamos mas filtros
                if ($filter->ref != null){
                    //$id_property = Properties::where('ref', $filter->ref)->first()->id;
                    //$id_property = Properties::where('ref', $filter->ref)->first()->id;
                   // $id_property = $filter->ref;
                    $properties = $properties->where('properties.ref', $filter->ref)
                    ->get();
                    //->where('images.id', DB::raw("(select MIN(images.id) as minID from images where images.property_id=properties.id)"))->get();
                    //filtrar por multiple ciudad seleccionada, solo si hay ciudades seleecionadas
                }
                elseif (0 < $propertyId) {
                    $properties = $properties->where('properties.id', $propertyId)
                    ->get();
                    //->where('images.id', DB::raw("(select MIN(images.id) as minID from images where images.property_id=properties.id)"))->get();

                }
                elseif($filter->owner_name != null){

                    $properties = $properties->where(DB::raw('lower(owners.name)'), 'like', '%'.strtolower( $filter->owner_name).'%')
                    ->get();
                    //->where('images.id', DB::raw("(select MIN(images.id) as minID from images where images.property_id=properties.id)"))->get();
                }
                else{

                    if($filter->type != null){
                        $property_type = explode(';', $filter->type)[0];
                        $property_subtype = explode(';', $filter->type)[1];
                        //filtramos por tipo de propiedad
                        $properties = $properties
                            ->where('properties.propertyable_type', 'App\\' . $property_type);
                            if($property_subtype!=null){
                                $properties = $properties->where(function ($query) use ($property_type, $property_subtype) {
                                    $query->orWhere('flats.type', $property_subtype)
                                          ->orWhere('homes.type', $property_subtype)
                                          ->orWhere('lands.type', $property_subtype)
                                          ->orWhere('promotions.promotion_property_types', 'like', '%'.$property_subtype.'%');
                                });
                            }

/*
                        if($filter->min_price!=null && $property_type=="Promotion"){
                            $properties = $properties
                                ->where('promotions.promotion_price_min', '<=', $filter->min_price)
                                ->where('promotions.promotion_price_max', '>=', $filter->min_price)
                                ;
                        }

                        if($filter->max_price!=null && $property_type=="Promotion"){
                            $properties = $properties
                            ->where('promotions.promotion_price_max', '<=', $filter->max_price)
                            ->where('promotions.promotion_price_max', '<=', $filter->max_price)
                            ;
                        }

                       */
                        if($filter->min_size!=null && $property_type=='Promotion'){
                            $properties = $properties->where('promotions.promotion_meters_max', '>=',  $filter->min_size);
                        }

                        if($filter->max_size!=null && $property_type=='Promotion'){
                            $properties = $properties->where('promotions.promotion_meters_min', '<=', $filter->max_size);
                        }

                    }

                    //dd($filter->min_price, $filter->type);

                    //filtramos por tipo de location (una location puede ser de inmobiliaria o de propiedad)
                    //->where('locations.locationable_type', 'App\\Properties')
                    //obtenemos solo la primera imagen de cada propiedad

                    //$properties->where('images.id', DB::raw("(select MIN(images.id) as minID from images where images.property_id=properties.id)"));

                    //filtrar por multiple ciudad seleccionada, solo si hay ciudades seleecionadas
                    if ($array_city  != null)
                        $properties = $properties->whereIn('locations.city_id', $array_city);
                    //resto de filtros
                    $properties = $properties->where($query)->get();
                }

                //dd($properties->first()->images->first()->url);

            foreach($properties as $property){
                $property->description = html_entity_decode($property->description);
                $property->price = number_format($property->price, 0, ',', '.');

                //$property->image = $property->getFirstImageOrPlaceholder();
            }

            $properties = $properties->unique('id');

            //dd($properties->toSql());
            //dd($properties->toSql(), $properties->getBindings());
            session()->flashInput($filter->input());

            return view('/backend/admin/inmo', [
                'filter' => $filter->all(),
                'properties' => $properties,
            ]);
        } catch (Exception $e) {
            return back()->withErrors(['Error al filtrar la propiedad ' . $e->getMessage()]);
        }
    }



    private function createSubType(Request $request)
    {

        $class_name = "App\\" . $request->propertyable_type;
        //necesario crear un nuevo array porque la longitud maxima de un request son 50 campos
        $array_create = $request->all();

        //necesario por que nos llega un string desde los checkbox
        //asignamos el valor a elevator,
        if ($request->elevator_property == "elevator" || $request->elevator_office == "elevator") {
            $array_create["elevator"] = true;
        } else {
            $array_create["elevator"] = false;
        }

        //asignamos valor a energetic certification
        if (
            $request->energetic_certification_general == "energetic_certification"
            || $request->energetic_certification_office == "energetic_certification"
        ) {
            $array_create["energetic_certification"] = true;
        } else {
            $array_create["energetic_certification"] = false;
        }

        //caracteristicas generales
        $characteristics                 = "";
        $characteristics                 .= $request->armarios;
        $characteristics                 .= ';' . $request->aire;
        $characteristics                 .= ';' . $request->terraza;
        $characteristics                 .= ';' . $request->balcon;
        $characteristics                 .= ';' . $request->trastero;
        $characteristics                 .= ';' . $request->garaje;
        $array_create["characteristics"] = $characteristics;

        //caracteristicas building
        $building_characteristics                 = "";
        $building_characteristics                 .= $request->piscina;
        $building_characteristics                 .= ';' . $request->zona_verde;
        $array_create["building_characteristics"] = $building_characteristics;


        //caracteristicas office
        if ($request->office_exclusive_use == "true") {
            $array_create["office_exclusive_use"] = true;
        } else {
            $array_create["office_exclusive_use"] = false;
        }
        //concat caracteristicas oficina
        $office_characteristics                 = "";
        $office_characteristics                 .= $request->agua_caliente;
        $office_characteristics                 .= ';' . $request->calefaccion;
        $office_characteristics                 .= ';' . $request->cocina;
        $office_characteristics                 .= ';' . $request->almacen;
        $office_characteristics                 .= ';' . $request->cristal_doble;
        $office_characteristics                 .= ';' . $request->falso_techo;
        $office_characteristics                 .= ';' . $request->suelo_tecnico;
        $array_create["office_characteristics"] = $office_characteristics;
        //concat security
        $security                 = "";
        $security                 .= $request->puerta_seguridad;
        $security                 .= ';' . $request->alarma;
        $security                 .= ';' . $request->control;
        $security                 .= ';' . $request->detector_incendios;
        $security                 .= ';' . $request->extintores;
        $security                 .= ';' . $request->aspersores;
        $security                 .= ';' . $request->cortafuegos;
        $security                 .= ';' . $request->luces;
        $security                 .= ';' . $request->conserje;
        $array_create["security"] = $security;


        //caracteristicas land
        if ($request->acceso_rodado == "true") {
            $array_create["acceso_rodado"] = true;
        } else {
            $array_create["acceso_rodado"] = false;
        }
        //concat caracteristicas land
        $land_characteristics                 = "";
        $land_characteristics                 .= $request->agua;
        $land_characteristics                 .= ';' . $request->luz;
        $land_characteristics                 .= ';' . $request->gas;
        $land_characteristics                 .= ';' . $request->alcantarillado;
        $land_characteristics                 .= ';' . $request->alumbrado;
        $land_characteristics                 .= ';' . $request->aceras;
        $array_create["land_characteristics"] = $land_characteristics;


        //por polimorfismo + fillable del modelo los campos se asignan automaticamente
        $subtype = $class_name::create($array_create);
        return $subtype;
    }


    function moveElement(&$array, $a, $b) {
        $out = array_splice($array, $a, 1);
        array_splice($array, $b, 0, $out);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request, [
            'agency_commissions_hidden' => 'required|gt:0',
        ]);*/



        try {

            DB::beginTransaction();
            //TODO VALIDATOR + TRANSACTION
            //funcion para crear el subtipo de propiedad, definida arriba
            $class_name = "App\\" . $request->propertyable_type;
            //necesario crear un nuevo array porque la longitud maxima de un request son 50 campos
            $array_create = $request->all();
            //necesario por que nos llega un string desde los checkbox
            //asignamos el valor a elevator,
            if ($request->elevator_property == "elevator" || $request->elevator_office == "elevator") {
                $array_create["elevator"] = true;
            } else {
                $array_create["elevator"] = false;
            }

            //asignamos valor a energetic certification
            if (
                $request->energetic_certification_general == "energetic_certification"
                || $request->energetic_certification_office == "energetic_certification"
            ) {
                $array_create["energetic_certification"] = true;
            } else {
                $array_create["energetic_certification"] = false;
            }

            //caracteristicas generales
            $characteristics                 = "";
            $characteristics                 .= $request->armarios;
            $characteristics                 .= ';' . $request->aire;
            $characteristics                 .= ';' . $request->terraza;
            $characteristics                 .= ';' . $request->balcon;
            $characteristics                 .= ';' . $request->trastero;
            $characteristics                 .= ';' . $request->garaje;
            $characteristics                 .= ';' . $request->check_energetic_certification_general;
            $characteristics                 .= ';' . $request->check_security;
            $array_create["characteristics"] = $characteristics;

            //caracteristicas building
            $building_characteristics                 = "";
            $building_characteristics                 .= $request->piscina;
            $building_characteristics                 .= ';' . $request->zona_verde;
            $array_create["building_characteristics"] = $building_characteristics;


            //caracteristicas office
            if ($request->office_exclusive_use == "true") {
                $array_create["office_exclusive_use"] = true;
            } else {
                $array_create["office_exclusive_use"] = false;
            }
            //concat caracteristicas oficina
            $office_characteristics                 = "";
            $office_characteristics                 .= $request->agua_caliente;
            $office_characteristics                 .= ';' . $request->calefaccion;
            $office_characteristics                 .= ';' . $request->cocina;
            $office_characteristics                 .= ';' . $request->almacen;
            $office_characteristics                 .= ';' . $request->cristal_doble;
            $office_characteristics                 .= ';' . $request->falso_techo;
            $office_characteristics                 .= ';' . $request->suelo_tecnico;
            $office_characteristics                 .= ';' . $request->elevator_office;
            $office_characteristics                 .= ';' . $request->energetic_certification_office;
            $array_create["office_characteristics"] = $office_characteristics;
            //concat security
            $security                 = "";
            $security                 .= $request->puerta_seguridad;
            $security                 .= ';' . $request->alarma;
            $security                 .= ';' . $request->control;
            $security                 .= ';' . $request->detector_incendios;
            $security                 .= ';' . $request->extintores;
            $security                 .= ';' . $request->aspersores;
            $security                 .= ';' . $request->cortafuegos;
            $security                 .= ';' . $request->luces;
            $security                 .= ';' . $request->conserje;
            $array_create["security"] = $security;


            //concat caracteristicas land
            $land_characteristics                 = "";
            $land_characteristics                 .= $request->agua;
            $land_characteristics                 .= ';' . $request->luz;
            $land_characteristics                 .= ';' . $request->gas;
            $land_characteristics                 .= ';' . $request->alcantarillado;
            $land_characteristics                 .= ';' . $request->alumbrado;
            $land_characteristics                 .= ';' . $request->aceras;
            $array_create["land_characteristics"] = $land_characteristics;


            $promotion_characteristics = "";
            $promotion_characteristics .= ';' .$request->piscina_comunitaria;
            $promotion_characteristics .= ';' .$request->zona_deportiva;
            $promotion_characteristics .= ';' .$request->zona_verde;
            $promotion_characteristics .= ';' .$request->juegos;
            $promotion_characteristics .= ';' .$request->promotion_seguridad;
            $promotion_characteristics .= ';' .$request->urb_cerrada;
            $array_create["promotion_characteristics"] = $promotion_characteristics;



            // XML <feature><![CDATA[ .....  ]]></feature>
            // XML file includes some random characteristics in plain text like:
            // [0] => Half an hour to Alicante airport
            // [1] => Less than 2 km. from the sea
            // [2] => Air conditioning
            // [3] => Furnished
            // [4] => White goods
            // [5] => Solarium
            // [6] => Terrace
            // We save as they are separated by semicolon.
            if ('true' === $request->uploadXML) {
                $array_create["xml_characteristics"] = implode('; ', $request->features);
            }

            if($request->propertyable_type == 'Flat'){
                $array_create['facade'] = $request->facade_flat;
                $array_create['type'] = $request->type_flat;
                $array_create['state'] = $request->state_flat;
                $array_create['floor'] = $request->floor;
            }
            elseif($request->propertyable_type == 'Home'){
                //dd($request->all());
                $array_create['type'] = $request->type_home;
                $array_create['state'] = $request->state_home;

            }
            elseif($request->propertyable_type == 'CountryHome'){
                //dd($request->all());
                $array_create['type'] = $request->type;
                $array_create['state'] = $request->estate;
            }
            elseif($request->propertyable_type == 'Land'){
                $array_create['type'] = $request->type;
                $array_create['maximum_buildable_floors'] = $request->maximum_buildable_floors;
                //caracteristicas land
                if ($request->acceso_rodado == "true") {
                    $array_create["acceso_rodado"] = 1;
                } else {
                    $array_create["acceso_rodado"] = 0;
                }
            }

            //si estamos creando una promocion el subtipo sera una promocion
            if($request->promotion == "promotion"){
                if ($request->promotion_rappel == "true") {
                    $array_create["promotion_rappel"] = 1;
                } else {
                    $array_create["promotion_rappel"] = 0;
                }

                if($request->promotion_property_types != null)
                    $array_create["promotion_property_types"] = implode(";",$request->promotion_property_types);

                $array_create["promotion_characteristics"] = $array_create["characteristics"]
                    . ";" .  $array_create["building_characteristics"]
                    . ";" .  $array_create["promotion_characteristics"]
                    . ";" . $request->check_energetic_certification_general
                    . ";" . $request->check_security;

                $promotion_delivery_date = Carbon\Carbon::createFromFormat('d-m-Y', $request->promotion_delivery_date)
                    ->format('Y-m-d');
                $array_create["promotion_delivery_date"] = $promotion_delivery_date;
                //por polimorfismo + fillable del modelo los campos se asignan automaticamente
                $subtype = Promotion::create($array_create);
                $request->propertyable_type = "Promotion";

            }else{//sino, creamos el subtipo seleccionado en la vista
                //por polimorfismo + fillable del modelo los campos se asignan automaticamente
                $subtype = $class_name::create($array_create);
            }

            //se crea el tipo general y relacionamos con el subtipo
            $array_create_property             = $request->all();
            if($request->promotion == "promotion"){
                $array_create_property["agency_commissions"]=0;
            }
            $array_create_property["owner_id"] = Auth::user()->owner->id;
            //morfismo añadimos nombre de la subclase y el id
            $array_create_property["propertyable_type"] = "App\\" . $request->propertyable_type;
            $array_create_property["propertyable_id"]   = $subtype->id;
           // $array_create_property["ref"]   = Carbon\Carbon::now()->timestamp;

            $property = Properties::create($array_create_property);

            // All the uploaded XML properties have status active by default
            if ('true' === $request->uploadXML) {
                $property->activate();
            }

            //
            // Getting and saving associated location
            // Both XML or HTTP
            $property->location()->create([
                'country_id' => $request->input('location_country_id', null),
                'state_id'   => $request->input('location_state_id', null),
                'county_id'  => $request->input('location_county_id', null),
                'city_id'    => $request->input('location_city_id', null),
                'street'     => $request->input('location_street', null),
                'postcode'   => $request->input('location_postcode', null),
                'latitude'   => $request->input('location_latitude', null),
                'longitude'  => $request->input('location_longitude', null),
            ]);

            //
            // Getting and saving associated images
            // Both XML or HTTP
            //
            if ($request->has('images')) {
                $orderedImages=[];

                foreach($request->imagesOrder as $key){
                    array_push($orderedImages, $request->images[$key]);
                    $request->replace(['images'=> $orderedImages]);
                }


                //$images = $request->images;
                $images = $orderedImages;
                $cont = 0;
                foreach ($images as $image) {
                    //Download the file using file_get_contents.
                    if ('true' === $request->uploadXML) {
                        $extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                    } else {
                        $extension = strtolower($image->getClientOriginalExtension());
                    }

                    //The path and filename that you want to save the file to.
                    $fileName = $property->id . "-" . strval($cont) . "-" . \Carbon\Carbon::now()->timestamp . '.' . $extension;
                    $cont++;

                    $folder   = $_SERVER['DOCUMENT_ROOT'] . '/' . config('inmozon.propertyImages') . $property->id . '/';

                    //si subimos de forma normal 1 propiedad lo que subimos son imagenes como archivo
                    if('true' === $request->uploadXML){
                        ProccessDonwnloadImage::dispatch($folder, $fileName, $image);


                    }else{ //solo descargamos imagenes si subimos por xml ya que se suben las url
                         $downloadedFileContents = file_get_contents($image);

                       //Check to see if file_get_contents failed.
                        if (false === $downloadedFileContents) {
                            throw new Exception('Failed to download file at: ' . $image);
                        }
                        //The path and filename that you want to save the file to.
                       // $fileName = md5($downloadedFileContents) . '.' . $extension;
                        if (!file_exists($folder)) {
                            mkdir($folder, 0775);
                        }
                        //Save the data using file_put_contents.
                        $save = file_put_contents($folder . $fileName, $downloadedFileContents, LOCK_EX);
                        //Check to see if it failed to save or not.
                        if (false === $save) {
                            throw new Exception('Failed to save file to: ', $fileName);
                        }
                    }



                    $property->images()->create([
                        'url' => config('inmozon.propertyImages') . $property->id . '/' . $fileName,
                    ]);
                }
            }

            //
            // Getting and saving attached documents
            //
            if ('true' !== $request->uploadXML) {
                //$documents = array();
                //segundo input de tipo multiple file (documentacion titularidad)
                if ($request->has('documentsPlanos') && (1 <= count($request->documentsPlanos))) {
                   //$documents = array_merge($documents, $request->documentsPlanos);
                   $this->saveDocuments($property, $request->documentsPlanos, 'planos');
                }
                if ($request->has('documentsDispo') && (1 <= count($request->documentsDispo))) {
                   //$documents = array_merge($documents, $request->documentsDispo);
                   $this->saveDocuments($property, $request->documentsDispo, 'dispo');

                }
                //primer input de tipo multiple file (documentos de identidad)
                if ($request->has('documentsMemoria')) {
                    //$documents = array_merge($documents, $request->documentsMemoria);
                   $this->saveDocuments($property, $request->documentsMemoria, 'memoria');

                }
            }

            DB::commit();
            /*si esta subiendo propiedades por xml, no debe hacer redirect, de esto se encarga la funcion
              uploadXML, que redirige al terminar de subir todas las propiedades,
              en caso de subir una sola propiedad manualmente, si que hace redirect al terminar*/
            if ('true' !== $request->uploadXML){
                $this->sendMailToOwner($property->id);
                return redirect("/owner/properties")->with('success', 'Propiedad creada correctamente, en proceso de validación por inmozon');
            }

        } catch (Exception $e) {
            DB::rollBack();
            if (config('app.debug')) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
            return back()->withInput()->withErrors(['Error al crear la propiedad']);
        }
    }

    private function saveDocuments(&$property, $documents, $prefijo){

        foreach ($documents as $document) {
            //Download the file using file_get_contents.
            $downloadedFileContents = file_get_contents($document);
            //Check to see if file_get_contents failed.
            if (false === $downloadedFileContents) {
                throw new Exception('Failed to download file at: ' . $document);
            }

            //The path and filename that you want to save the file to.
            $fileName = '_'.$prefijo.'-'.strtolower($document->getClientOriginalName());
            $folder   =
                $_SERVER['DOCUMENT_ROOT'] . '/' . config('inmozon.propertyDocuments') . $property->id . '/';

            if (!file_exists($folder)) {
                mkdir($folder, 0775);
            }
            //Save the data using file_put_contents.
            $save = file_put_contents($folder . $fileName, $downloadedFileContents, LOCK_EX);

            //Check to see if it failed to save or not.
            if (false === $save) {
                throw new Exception('Failed to save file to: ', $fileName);
            }
            $property->documents()->create([
                'url' => config('inmozon.propertyDocuments') . $property->id . '/' . $fileName,
            ]);
        }

    }

    public function sendMailToPropertiesInFavorites(
            $property_id,
            $agency_commissions_old=null,
            $agency_commissions_new=null,
            $price_old=null,
            $price_new=null
        ){

        $property = Properties::find($property_id);
        $real_estates = $property->real_estates;
        $owner = $property->owner;
        $user = $owner->user;

        $emails = array();
        foreach($real_estates as $real_estate){
            array_push( $emails, $real_estate->user->email);
        }
        //todo translation set locale
        $property_promotion = trans($property->isPromotion() ? 'promoción' : 'propiedad');

        $mailData = array(
            'from' => array(
                        'name'    => 'Inmozon',
                        //password: @inmozon.inmo
                        'address' => 'web@inmozon.com'
                    ),
            'subject'  => trans('Inmozon: ').$property_promotion.trans(' propiedad modificada'),
            'view'     => 'emails.emailPropertyUpdated',
            'params'   => array(
                    'owner_name' => $owner->name,
                    'owner_email' => $user->email,
                    'id' => $property->id,
                    'street' => $property->location->street,
                    'city' => $property->location->city->name,
                    'price_old' => number_format($price_old, 0, ',', '.'),
                    'price_new' => number_format($price_new, 0, ',', '.'),
                    'agency_commissions_old' => $agency_commissions_old,
                    'agency_commissions_new' => $agency_commissions_new,
                    'property_promotion' => $property_promotion,

                    ),

            'to'   => $emails,
            'cc'   => [],
            'bcc'  => [],


        );

       $dd = $this->mailService->send($mailData);

    }




    public function sendMailToOwner( $property_id=null){
        //se manda un correo despues de subir una propiedad
        try{

            $property = Properties::find($property_id);
            $owner = $property->owner;
            $price = number_format(($property->price), 2, ',', '.');
            $property_promotion=null;
            $property_promotion = $property->isPromotion();

            //almacenar idioma de la aplicacion
            $previousLocale = app()->getLocale();
            //cambiar al idioma del usuario para mandar el email
            app()->setLocale($owner->language);

            $mailData = array(
                'from' => array(
                            'name'    => 'Inmozon',
                            //password: @inmozon.inmo
                            'address' => 'web@inmozon.com'
                        ),
                'subject'  => 'Inmozon: '.trans($property_promotion ? 'promoción' : 'propiedad').' '.trans(' creada'),
                'view'     => 'emails.emailPropertyCreated',
                'params'   => array(
                        'owner_name' => $owner->name,
                        'id' => $property->id,
                        'price' => $price,
                        'street' => $property->location->street,
                        'city' => $property->location->city->name,
                        'county' => $property->location->county->name,
                        'commissions' => $property->agency_commissions,
                        'property_promotion' => $property_promotion,
                        ),

                'to'   => $owner->user->email,
                'cc'   => [],
                'bcc'  => [],


            );

           $dd = $this->mailService->send($mailData);
           app()->setLocale($previousLocale);

        }catch(Exception $e){
            return back()->withErrors(['error' . $e->getMessage()]);
        }
    }



    public function printPDF($idProperty = null)
    {
        //se manda un correo despues de pedir una cita
        try {

            $property = Properties::findOrFail($idProperty);
            $img1 = $property->images->first()->url ?? 'assets/frontend/images/icon/logo_house.jpg';
            $img2 = $property->images[1]->url ?? 'assets/frontend/images/icon/logo_house.jpg';
            $img3 = $property->images[2]->url ?? 'assets/frontend/images/icon/logo_house.jpg';
            $char = explode(';',$property->getCharacteristics());
            $char1 = array_slice($char, 0, 5);
            $char2 = array_slice($char, 5, 5);
            $char3 = array_slice($char, 9, 5);

            $arr = explode (" " , $property->description);
            $lines = array_chunk($arr,15);
            $description="";
            foreach($lines as $line)
                $description = $description.implode (" ", $line)."\r\n";

            $data = [
                'propertyId' => $property->id,
                'img1' => $img1,
                'img2' => $img2,
                'img3' => $img3,
                'type' => $property->translateModelName($property->propertyable_type),
                'city' => $property->location->city->name,
                'county' => $property->location->county->name,
                'bedrooms' => $property->propertyable->bedrooms,
                'bathrooms' => $property->propertyable->bathrooms,
                'description' => $description,
                'telf' => $property->owner->phone1,
                'characteristics1' => $char1,
                'characteristics2' => $char2,
                'characteristics3' => $char3,
                'piscina' => $property->hasSwimmingPool(),
                'property_status' => $property->property_status,
                'price' => number_format($property->price, 0, ',', '.').'€',
                'm2' => $property->propertyable->built_meters ?? $property->propertyable->usefull_meters??'m2',
                'distance_airport' => $property->distance_airport. 'Km',
                'distance_sea' => $property->distance_sea.' Km',
                'distance_beach' => $property->distance_beach.' Km',
                'distance_city' => $property->distance_city.' Km',
                'distance_golf' => $property->distance_golf.' Km',
            ];

            $pdf = PDF::loadView('pdfs.pdfProperty', $data);
            $stringName = 'ID'.$property->id.'_DATE'.CarbonCarbon::now()->format('d-m-Y');
            return $pdf->download($stringName.'.pdf');

        } catch (Exception $e) {
            return back()->withErrors(['error' . $e->getMessage()]);
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            //validation property general
            'price' => 'required|gt:0',


            //validation location
            'location_country_id' => 'required|gt:0',
            'location_state_id' => 'required|gt:0',
            'location_county_id' => 'required|gt:0',
            'location_city_id' => 'required|gt:0',
            //'location_street' => 'required',
            //'location_postcode' => 'required',
        ]);

        try {

            DB::beginTransaction();



            $owner    = Auth::user()->owner;
            $property = $owner->properties()->where('id', $id)->first();
            //asegurar que este propietario es dueño de esta propiedad
            if ($property == null) {
                return back()->withErrors(['Esta propiedad no pertenece a este propietario']);
            }

            $class_name = "App\\" . $request->propertyable_type;
            //necesario crear un nuevo array porque la longitud maxima de un request son 50 campos
            $array_create = $request->all();


            //necesario por que nos llega un string desde los checkbox
            //asignamos el valor a elevator,
            if ($request->elevator_property == "elevator" || $request->elevator_office == "elevator") {
                $array_create["elevator"] = true;
            } else {
                $array_create["elevator"] = false;
            }
/*
            //asignamos valor a energetic certification
            if (
                $request->check_energetic_certification_general == "check_energetic_certification_general"
                //|| $request->energetic_certification_office == "energetic_certification_office"
            ) {
                $array_create["energetic_certification"] = true;
            } else {
                $array_create["energetic_certification"] = false;

                if( $request->propertyable_type=='Office' &&
                 $request->energetic_certification_office == "energetic_certification_office"){
                    $array_create["energetic_certification"] = true;
                }
            }
*/
            //caracteristicas generales
            $characteristics                 = "";
            $characteristics                 .= $request->armarios;
            $characteristics                 .= ';' . $request->aire;
            $characteristics                 .= ';' . $request->terraza;
            $characteristics                 .= ';' . $request->balcon;
            $characteristics                 .= ';' . $request->trastero;
            $characteristics                 .= ';' . $request->garaje;
            $characteristics                 .= ';' . $request->check_security;
            $characteristics                 .= ';' . $request->check_energetic_certification_general;
            $characteristics                 .= ';' . $request->check_security;
            $array_create["characteristics"] = $characteristics;

            //caracteristicas building
            $building_characteristics                 = "";
            $building_characteristics                 .= $request->piscina;
            $building_characteristics                 .= ';' . $request->zona_verde;
            $array_create["building_characteristics"] = $building_characteristics;

            //caracteristicas office
            if ($request->office_exclusive_use == "true") {
                $array_create["office_exclusive_use"] = true;
            } else {
                $array_create["office_exclusive_use"] = false;
            }
            //concat caracteristicas oficina
            $office_characteristics                 = "";
            $office_characteristics                 .= $request->agua_caliente;
            $office_characteristics                 .= ';' . $request->calefaccion;
            $office_characteristics                 .= ';' . $request->cocina;
            $office_characteristics                 .= ';' . $request->almacen;
            $office_characteristics                 .= ';' . $request->cristal_doble;
            $office_characteristics                 .= ';' . $request->falso_techo;
            $office_characteristics                 .= ';' . $request->suelo_tecnico;
            $office_characteristics                 .= ';' . $request->elevator_office;
            $office_characteristics                 .= ';' . $request->energetic_certification_office;
            $array_create["office_characteristics"] = $office_characteristics;
            //concat security
            $security                 = "";
            $security                 .= $request->puerta_seguridad;
            $security                 .= ';' . $request->alarma;
            $security                 .= ';' . $request->control;
            $security                 .= ';' . $request->detector_incendios;
            $security                 .= ';' . $request->extintores;
            $security                 .= ';' . $request->aspersores;
            $security                 .= ';' . $request->cortafuegos;
            $security                 .= ';' . $request->luces;
            $security                 .= ';' . $request->conserje;
            $array_create["security"] = $security;



            //concat caracteristicas land
            $land_characteristics                 = "";
            $land_characteristics                 .= $request->agua;
            $land_characteristics                 .= ';' . $request->luz;
            $land_characteristics                 .= ';' . $request->gas;
            $land_characteristics                 .= ';' . $request->alcantarillado;
            $land_characteristics                 .= ';' . $request->alumbrado;
            $land_characteristics                 .= ';' . $request->aceras;
            $array_create["land_characteristics"] = $land_characteristics;

            $promotion_characteristics = "";
            $promotion_characteristics .= ';' .$request->piscina_comunitaria;
            $promotion_characteristics .= ';' .$request->zona_deportiva;
            $promotion_characteristics .= ';' .$request->zona_verde;
            $promotion_characteristics .= ';' .$request->juegos;
            $promotion_characteristics .= ';' .$request->promotion_seguridad;
            $promotion_characteristics .= ';' .$request->urb_cerrada;
            $array_create["promotion_characteristics"] = $promotion_characteristics;

            if($request->propertyable_type == 'Flat'){
                $array_create['facade'] = $request->facade_flat;
                $array_create['type'] = $request->type_flat;
                $array_create['state'] = $request->state_flat;
                $array_create['floor'] = $request->floor;
            }
            elseif($request->propertyable_type == 'Home'){
                $array_create['type'] = $request->type_home;
                $array_create['state'] = $request->state_home;
            }
            elseif($request->propertyable_type == 'CountryHome'){
                //$array_create['type'] = $request->type;
                $array_create['state'] = $request->estate;
                $array_create['built_meters'] = $request->built_meters_countryhome;
            }
            elseif($request->propertyable_type == 'Land'){
                $array_create['type'] = $request->type;
                $array_create['maximum_buildable_floors'] = $request->maximum_buildable_floors;
                //caracteristicas land
                if ($request->acceso_rodado == "true") {
                    $array_create["acceso_rodado"] = 1;
                } else {
                    $array_create["acceso_rodado"] = 0;
                }
            }


             //si estamos creando una promocion el subtipo sera una promocion
             if($request->promotion == "promotion"){
                if ($request->promotion_rappel == "true") {
                    $array_create["promotion_rappel"] = 1;
                } else {
                    $array_create["promotion_rappel"] = 0;
                }

                if($request->promotion_property_types != null)
                    $array_create["promotion_property_types"] = implode(";",$request->promotion_property_types);

                $array_create["promotion_characteristics"] = $array_create["characteristics"]
                    . ";" .  $array_create["building_characteristics"]
                    . ";" .  $array_create["promotion_characteristics"]
                    . ";" . $request->check_energetic_certification_general
                    . ";" . $request->check_security;

                $promotion_delivery_date = Carbon\Carbon::createFromFormat('d-m-Y', $request->promotion_delivery_date)
                ->format('Y-m-d');
                $array_create["promotion_delivery_date"] = $promotion_delivery_date;
                //por polimorfismo + fillable del modelo los campos se asignan automaticamente
                $subtype = Promotion::create($array_create);
                $request->propertyable_type = "Promotion";
            }else{//sino, creamos el subtipo seleccionado en la vista
                //por polimorfismo + fillable del modelo los campos se asignan automaticamente
                $subtype = $class_name::create($array_create);
            }

            //por polimorfismo + fillable del modelo los campos se asignan automaticamente
            //creamos el subtipo nuevo
            //$subtype = $class_name::create($array_create);

            //borramos el subtipo anterior
            $property->propertyable->delete();

            //se crea el tipo general y relacionamos con el subtipo
            $array_create_property             = $request->all();
            $array_create_property["owner_id"] = Auth::user()->owner->id;
            //morfismo añadimos nombre de la subclase y el id
            $array_create_property["propertyable_type"] = "App\\" . $request->propertyable_type;
            $array_create_property["propertyable_id"]   = $subtype->id;
            if($request->promotion == "promotion"){
                $array_create_property["agency_commissions"]=0;
            }
            $property = Properties::findOrFail($id);

            ///antes de actualizar la variable, guardamos su comision y precio anteriores
            $price_old = $property->price;
            $agency_commissions_old = $property->agency_commissions;
            $property->agency_commissions = (float) $request->agency_commissions;

            $property->update($array_create_property);


            //si hemos mandado la propiedad a revision entonces cambiamos su estado
                if($request->toCheck == "toCheck"){
                    $property->owner_check();
                }

            //
            // Getting and saving associated location
            // Both XML or HTTP
            $property->location()->delete();
            $property->location()->updateOrCreate([
                'country_id' => $request->input('location_country_id', null),
                'state_id'   => $request->input('location_state_id', null),
                'county_id'  => $request->input('location_county_id', null),
                'city_id'    => $request->input('location_city_id', null),
                'street'     => $request->input('location_street', null),
                'postcode'   => $request->input('location_postcode', null),
                'latitude'   => $request->input('location_latitude', null),
                'longitude'  => $request->input('location_longitude', null),
            ]);

            //
            // Getting and saving associated images
            // Both XML or HTTP
            //
            //&& (3 <= count($request->images)
            if ($request->has('images') ) {

                $images = $request->images;
                foreach ($images as $image) {
                    //Download the file using file_get_contents.

                    $downloadedFileContents = file_get_contents($image);
                    if ('true' === $request->uploadXML) {
                        $extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                    } else {
                        $extension = strtolower($image->getClientOriginalExtension());
                    }
                    //Check to see if file_get_contents failed.
                    if (false === $downloadedFileContents) {
                        throw new Exception('Failed to download file at: ' . $image);
                    }

                    //The path and filename that you want to save the file to.
                    $fileName = md5($downloadedFileContents) . '.' . $extension;
                    $folder   = $_SERVER['DOCUMENT_ROOT'] . '/' . config('inmozon.propertyImages') . $property->id . '/';

                    if (!file_exists($folder)) {
                        mkdir($folder, 0775);
                    }
                    //Save the data using file_put_contents.
                    $save = file_put_contents($folder . $fileName, $downloadedFileContents, LOCK_EX);

                    //Check to see if it failed to save or not.
                    if (false === $save) {
                        throw new Exception('Failed to save file to: ', $fileName);
                    }
                    $i=0;
                    $property->images()->create([
                        'url' => config('inmozon.propertyImages') . $property->id . '/' . $fileName,
                        'order' =>  array_search('input-'.$i, $request->imagesOrder)
                    ]);
                    $i++;
                }


            }

            foreach($request->imagesOrder as $key => $imageOrder){

                if(str_contains($imageOrder, 'id-' )){
                    $image = Image::find(substr($imageOrder, 3));
                    $image->order=$key;
                    $image->save();
                }
            }

            //if($request->has('imagesOrder')){

            //}
            //
            // Getting and saving attached documents
            //
            if ('true' !== $request->uploadXML) {
                if($request->has('documentsPlanos')){

                    $this->saveDocuments($property, $request->documentsPlanos, 'planos');
                }
                if($request->has('documentsDispo')){
                    $this->saveDocuments($property, $request->documentsDispo, 'dispo');
                }
                if($request->has('documentsMemoria')){
                    $this->saveDocuments($property, $request->documentsMemoria, 'memoria');
                }
            }

            DB::commit();



            //enviar correo si ha cambiado algunos de estos campos
            if($agency_commissions_old!=$request->agency_commissions
            || $price_old!=$request->price){

                $this->sendMailToPropertiesInFavorites(
                    $id,
                    $agency_commissions_old,
                    $request->agency_commissions,
                    $price_old,
                    $request->price
                );
            }

            return redirect("/owner/properties")->with('success', 'Propiedad modificada correctamente');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' . $e->getMessage()]);
        } finally {
        }
    }



    private function countRealEstateFavsNumber($property_id)
    {
        //numero de inmobiliarias que tienen en favoritos alguna de las propiedades de un owner en particular
        $count_re_favs = DB::table('retail_favorites_properties')
            ->where('retail_favorites_properties.property_id', $property_id)
            ->count();
        return $count_re_favs;
    }

    private function countOpenCards($property_id)
    {
        //numero de aperturas de ficha por mes
        $result =  DB::table('cards')
            ->where('cards.property_id', $property_id)
            ->count();

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try{
            //$owner = Auth::user()->owner;
            if (Auth::user()->type == "owner") {
                //asegurar que este propietario es dueño de esta propiedad
                $owner    = Auth::user()->owner;
                $property = $owner->properties()->where('id', $id)->first();

            } else {
                //en caso de que sea un admin que va a validar la propiedad
                $property = Properties::find($id);
            }
            $owner = Properties::findOrFail($id)->owner;

            $countries  = Country::all();  // Only Spain by now, 1 record

            //mostrar datos de contacto si estamos en real_estate y tenemos ficha abierta con esta propiedad
            $show_contact = false;
            if (Auth::user()->type == "real_estate") {
                //si ya tiene ficha no añadir de
                $show_contact = DB::table('cards')
                    ->where([
                        [
                            'real_estate_id',
                            '=',
                            Auth::user()->real_estate->id
                        ],
                        [
                            'property_id',
                            '=',
                            $property->id
                        ],
                    ])->exists();
            }


            $edit_active = in_array($property->historical->last()->status->id, [2, 6]);




            if ($property != null) {
                $agency_commissions_value =  ($property->price * $property->agency_commissions*0.01);
                if($property->owner->type=='agente' && $agency_commissions_value<2000)
                    $agency_commissions_value = 2000;
                elseif($property->owner->type!='agente' && $agency_commissions_value<3000)
                    $agency_commissions_value = 3000;

                $iva =  $agency_commissions_value*0.21;
                $calculated_commission =  $property->price - $agency_commissions_value - $iva;

                $property->agency_commissions_value =  number_format($agency_commissions_value, 2, ",", ".") ;
                $property->iva =  number_format($iva, 2, ",", ".") ;
                $property->calculated_commission =  number_format($calculated_commission, 2, ",", ".");

                if($property->historical->last()->status->name == 'Activa'){
                    $updated_at = Carbon\Carbon::parse($property->historical->last()->updated_at);
                    $now = Carbon\Carbon::now();
                    $property->validated_time = $updated_at->diffInDays($now);
                }



                return view(
                    'properties.edit_property',
                    [
                        'edit_active'        => false,
                        'show_contact'       => $show_contact,
                        'minimum_commission' => Config::minimum_commission(),
                        'property_subtype'   => $property->propertyable,
                        'property'           => $property,
                        'countries'          => $countries,
                        'owner'              => $owner,
                        'count_re_favs'      => $this->countRealEstateFavsNumber($id),
                        'countOpenCards'      => $this->countOpenCards($id),
                    ]
                );
            } else {
                return redirect('/owner')->withErrors('Este esta propiedad no se corresponde con este propietario');
            }
        }catch (Exception $e) {

            return back()->withErrors(['error' . $e->getMessage()]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $owner = Auth::user()->owner;
        //asegurar que este propietario es dueño de esta propiedad
        $property = $owner->properties()->findOrFail($id);

        $countries  = Country::all();  // Only Spain by now, 1 record

        // @TODO @DCA 2020-09-01 refactorizado el IF para un simple TRUE, FALSE sobre la misma variable.
        //        $edit_active = false;
        //        if (
        //            $property->historical->last()->status->id == 2
        //            || $property->historical->last()->status->id == 6
        //        ) {
        //            $edit_active = true;
        //        }

        //variable que le pasamos a la vista para activar o desactivar la edicion
        //si la propiedad esta activa o en proceso de propietario,
        //podemos editarla
        $edit_active = in_array($property->historical->last()->status->id, [2, 6]);

        $agency_commissions_value =  ($property->price * $property->agency_commissions*0.01);
        if($property->owner->type=='agente' && $agency_commissions_value<2000)
            $agency_commissions_value = 2000;
        elseif($property->owner->type!='agente' && $agency_commissions_value<3000)
            $agency_commissions_value = 3000;

        $iva =  $agency_commissions_value*0.21;
        $calculated_commission =  $property->price - $agency_commissions_value - $iva;

        $property->agency_commissions_value =  number_format($agency_commissions_value, 2, ",", ".") ;
        $property->iva =  number_format($iva, 2, ",", ".") ;
        $property->calculated_commission =  number_format($calculated_commission, 2, ",", ".");
        //$property->price =  number_format($property->price, 2, ",", ".");
       // $property->agency_commissions =  number_format($property->agency_commissions, 2, ",", ".");


       $minimum_commission=0;
            if(Auth::user()->type=='owner' && Auth::user()->owner->type=='agente'){
                $minimum_commission = Config::minimum_commission_agente();
            }
            else{
                $minimum_commission = Config::minimum_commission();
            }

        if ($property != null) {
            return view(
                'properties.edit_property',
                [
                    'edit_active'        => $edit_active,
                    'minimum_commission' => $minimum_commission,
                    'property_subtype'   => $property->propertyable,
                    'property'           => $property,
                    'countries'          => $countries,
                    'owner'              => $owner,
                    'count_re_favs'      => $this->countRealEstateFavsNumber($id),
                    'countOpenCards'      => $this->countOpenCards($id),

                ]
            );
        } else {
            return redirect('/owner')->withErrors('Esta propiedad no se corresponde con este propietario');
        }
    }




    //////////// manejo de estados de la propiedad  ///////////////////////
    public function deactivateProperty(Request $request, $id)
    {
        $property = null;

        if (Auth::user()->type == 'owner') {
            $owner = Auth::user()->owner;
            //asegurar que este propietario es dueño de esta propiedad
            $property = $owner->properties()->where('id', $id)->first();
        } else {
            //si es un admin podemos desactivar cualquier propiedad
            $property = Properties::find($id);
        }

        if ($property != null && $property->historical->last()->status->id == 2) {

            if (Auth::user()->type == 'owner') {
                $property->deactivate($request->reason);
                return redirect('/owner/properties')->with('succes', 'Propiedad desactivada correctamente');
            } else {
                //si es un admin podemos desactivar cualquier propiedad
                $property->deactivate($request->reason, Auth::user()->admin->id);
                return redirect('/admin/properties')->with('succes', 'Propiedad desactivada correctamente');
            }
            //se encarga del historico
        } else {
            return back()->withErrors('Error: la propiedad no se puede desactivar en este momento');
        }
    }

    public function activateProperty(Request $request, $id)
    {

        $owner    = Auth::user()->owner;
        $property = $owner->properties()->where('id', $id)->first();
        //asegurar que este propietario es dueño de esta propiedad
        if ($property != null && $property->historical->last()->status->id == 4) {
            //se encarga del historico
            $property->activate();
            return back()->with('succes', 'Propiedad activada correctamente');
        } else {
            return back()->with('error', 'Error: la propiedad no se puede activar en este momento');
        }
    }


    public function sendMailToREOpenCards($property_id){

        $property = Properties::find($property_id);
        $real_estates = $property->ficha;
        $emails = array();
        foreach($real_estates as $real_estate){
            array_push( $emails, $real_estate->user->email);
        }

        $reListSpanish=$real_estates->where('language', 'es');
        $reListFrench=$real_estates->where('language', 'fr');
        $reListEnglish=$real_estates->where('language', 'en');

        /////////////////enviar a las inmobiliarias en español
        $emails = array();
        foreach($reListSpanish as $real_estate){
            array_push( $emails, $real_estate->user->email);
        }
        //almacenar idioma de la aplicacion
        $previousLocale = app()->getLocale();
        //cambiar al idioma de la inmobiliaria para mandar el email
        app()->setLocale('es');
        $property_promotion = trans($property->isPromotion() ? 'promoción' : 'propiedad');
        $mailData = array(
            'from' => array(
                        'name'    => 'Inmozon',
                        //password: @inmozon.inmo
                        'address' => 'web@inmozon.com'
                    ),
            'subject'  => 'Inmozon: '.$property_promotion.' '.trans('retirada de la venta'),
            'view'     => 'emails.emailPropertySold',
            'params'   => array(
                    'id' => $property->id,
                    'street' => $property->location->street,
                    'city' => $property->location->city->name,
                    'property_promotion' => $property_promotion,

                    ),

            'to'   => $emails,
            'cc'   => [],
            'bcc'  => [],
        );
    $dd1 = $this->mailService->send($mailData);
        //////////////////////////////////////////////////

        ////////// enviar en ingles ////////////////////////
        $emails = array();
        foreach($reListEnglish as $real_estate){
            array_push( $emails, $real_estate->user->email);
        }

        //cambiar al idioma de la inmobiliaria para mandar el email
        app()->setLocale('en');
        $property_promotion = trans($property->isPromotion() ? 'promoción' : 'propiedad');
        $mailData = array(
            'from' => array(
                        'name'    => 'Inmozon',
                        //password: @inmozon.inmo
                        'address' => 'web@inmozon.com'
                    ),
            'subject'  => 'Inmozon: '.$property_promotion.' '.trans('retirada de la venta'),
            'view'     => 'emails.emailPropertySold',
            'params'   => array(
                    'id' => $property->id,
                    'street' => $property->location->street,
                    'city' => $property->location->city->name,
                    'property_promotion' => $property_promotion,

                    ),

            'to'   => $emails,
            'cc'   => [],
            'bcc'  => [],
        );
    $dd2 = $this->mailService->send($mailData);
        /////////////////////////////////////////////////

        ////////// enviar en frances ////////////////////////
        $emails = array();
        foreach($reListFrench as $real_estate){
            array_push( $emails, $real_estate->user->email);
        }

        //cambiar al idioma de la inmobiliaria para mandar el email
        app()->setLocale('fr');
        $property_promotion = trans($property->isPromotion() ? 'promoción' : 'propiedad');
        $mailData = array(
            'from' => array(
                        'name'    => 'Inmozon',
                        //password: @inmozon.inmo
                        'address' => 'web@inmozon.com'
                    ),
            'subject'  => 'Inmozon: '.$property_promotion.' '.trans('retirada de la venta'),
            'view'     => 'emails.emailPropertySold',
            'params'   => array(
                    'id' => $property->id,
                    'street' => $property->location->street,
                    'city' => $property->location->city->name,
                    'property_promotion' => $property_promotion,

                    ),

            'to'   => $emails,
            'cc'   => [],
            'bcc'  => [],
        );
    $dd3 = $this->mailService->send($mailData);
        /////////////////////////////////////////////////
        //volver al idioma anterior de la aplicacion
        app()->setLocale($previousLocale);
}

    public function soldProperty(Request $request, $id)
    {
        try{
            if (Auth::user()->type == 'owner') {
                $owner    = Auth::user()->owner;
                $property = $owner->properties()->where('id', $id)->first();
                //asegurar que este propietario es dueño de esta propiedad
                if ($property == null ) {
                    return back()->withErrors(['Error: la propiedad no pertenece a este propietario']);
                }
            } else {
                //si es un admin podemos desactivar cualquier propiedad
                $property = Properties::findOrFail($id);
            }

            if ($property != null ) {
                //se encarga del historico
                $property->sold();

                $this->sendMailToREOpenCards($property->id);


                return back()->with('succes', 'Propiedad marcada como vendida');
            } else {
                return back()->withErrors([ 'Error: la propiedad no se puede marcar como vendida en este momento']);
            }
        }catch(Exception $e){
            return back()->withErrors(['Error: la propiedad no se puede marcar como vendida en este momento'.$e->getMessage()]);

        }

    }

    public function sendMailToOwnerCanceledProperty($property_id)
    {
        //se manda un correo despues de pedir una cita
        try {
            $property = Properties::findOrFail($property_id);
            $owner = $property->owner;
            $property_promotion=null;
            $property_promotion = $property->isPromotion();

                 //almacenar idioma de la aplicacion
                 $previousLocale = app()->getLocale();
                 //cambiar al idioma de la inmobiliaria para mandar el email
                 app()->setLocale($owner->language);

            $mailData = array(
                'from' => array(
                    'name'    => 'Inmozon',
                    //password: @inmozon.inmo
                    'address' => 'web@inmozon.com'
                ),
                'subject'  => 'Inmozon: '.$property_promotion.' cancelada',
                'view'     => 'emails.emailPropertyCanceled',
                'params'   => array(
                    'owner_name' => $owner->name,
                    'street' => $property->location->street,
                    'id' => $property->id,
                    'property_promotion' => $property_promotion,

                ),
                'to'   => $owner->user->email,
                'cc'   => [],
                'bcc'  => [],
            );

            $dd = $this->mailService->send($mailData);
        } catch (Exception $e) {
            return back()->withErrors(['error' . $e->getMessage()]);
        }
    }

    public function sendMailToOwnerValidatedProperty($property_id)
    {

        //se manda un correo despues de pedir una cita
        try {
            $property = Properties::findOrFail($property_id);
            $owner = $property->owner;
            $property_promotion=null;

            $property_promotion = $property->isPromotion();

            //almacenar idioma de la aplicacion
            $previousLocale = app()->getLocale();
            //cambiar al idioma de la inmobiliaria para mandar el email
            app()->setLocale($owner->language);

            $mailData = array(
                'from' => array(
                    'name'    => 'Inmozon',
                    //password: @inmozon.inmo
                    'address' => 'web@inmozon.com'
                ),
                'subject'  => 'Inmozon: propiedad validada',
                'view'     => 'emails.emailPropertValidated',
                'params'   => array(
                    'owner_name' => $owner->name,
                    'street' => $property->location->street,
                    'id' => $property->id,
                    'property_promotion' => $property_promotion,

                ),
                'to'   => $owner->user->email,
                'cc'   => [],
                'bcc'  => [],
            );

            $dd = $this->mailService->send($mailData);

            app()->setLocale($previousLocale);
        } catch (Exception $e) {
            return back()->withErrors(['error' . $e->getMessage()]);
        }
    }

    public function validateProperty(Request $request, $id)
    {
        $property = Properties::find($id);
        $property->activate(Auth::user()->admin->id);
        $this->sendMailToOwnerValidatedProperty($id);
        return redirect('/admin/to_validate/')->with('success', 'Propiedad validada correctamente');
    }

    public function cancelProperty(Request $request, $id)
    {
        $property = Properties::find($id);
        $property->cancel($request->reason, Auth::user()->admin->id);
        $this->sendMailToOwnerCanceledProperty($id);
        return redirect('/admin/to_validate/')->with('success','Propiedad cancelada correctamente');
    }

    public function inmozonCheckProperty(Request $request, $id)
    {
        $property = Properties::find($id);
        $property->inmozon_check($request->reason, Auth::user()->admin->id);
        $this->sendMailToOwnerCheckProperty($id);
        return redirect('/admin/to_validate')->with('success','Propiedad puesta en revisión');
    }

    public function ownerCheckProperty(Request $request, $id)
    {
        $property = Properties::find($id);
        $property->owner_check($request->reason);
        return redirect('/owner/properties')->with('success','Propiedad puesta en revisión');
    }



    public function sendMailToOwnerCheckProperty( $property_id=null){
        //se manda un correo despues de subir una propiedad
        try{
            $property = Properties::find($property_id);
            $owner = $property->owner;

                 //almacenar idioma de la aplicacion
                 $previousLocale = app()->getLocale();
                 //cambiar al idioma del usuario para mandar el email
                 app()->setLocale($owner->language);

            $property_promotion = trans($property->isPromotion() ? 'promoción' : 'propiedad');

            $mailData = array(
                'from' => array(
                            'name'    => 'Inmozon',
                            //password: @inmozon.inmo
                            'address' => 'web@inmozon.com'
                        ),
                'subject'  => 'Inmozon: '.$property_promotion.' '.trans('puesta en revisión'),
                'view'     => 'emails.emailPropertyToCheck',
                'params'   => array(
                        'owner_name' => $owner->name,
                        'id' => $property->id,
                        'street' => $property->location->street,
                        'city' => $property->location->city->name,
                        'county' => $property->location->county->name,
                        'property_promotion' => $property_promotion,

                        ),

                'to'   => $owner->user->email,
                'cc'   => [],
                'bcc'  => [],
            );

           $dd = $this->mailService->send($mailData);
           app()->setLocale($previousLocale);
        }catch(Exception $e){
            return back()->withErrors(['error' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $owner = Properties::find($id);
        $owner->delete();
        return redirect('/owner/properties');
    }

    public function uploadXMLJob(UploadPropertiesXMLRequest $request){

        // ProcessImportXML::dispatch($request->all());
        try{


            $this->uploadXML( $request);
            return redirect('/owner/properties')->with('success', 'Fichero subido correctamente, guardando propiedades');

        }catch(Exception $e){
            if (config('app.debug'))
            return redirect('/owner/properties')->withErrors(['Error al subir el fichero'.$e->getMessage()]);


        return redirect('/owner/properties')->withErrors(['Error al subir el fichero']);
        }
    }
    /**
     * Import and Read XML file with properties
     *
     * @example https://oleinternational.com/kyero/exclusivasre
     *
     * @param \App\Http\Requests\UploadPropertiesXMLRequest $request
     *
     * @return void
     */
    public function uploadXML(UploadPropertiesXMLRequest $request)
    {   

        //crear job

        /**
         * This array is the translation from the XML node <type>Villa</type> to an application Model
         * It is necessary due to the use of the polymorphic relation in the properties table
         * with other tables with the specific characteristics of every property uploaded.
         *
         * @var array $propertyDictionary
         */


        $propertyDictionary = [
            'Apartment'              => 'Flat',
            'Commercial'             => 'Commercial',
            'Cottage'                => 'CountryHome',
            'Ground floor apartment' => 'Flat',
            'Land'                   => 'Land',
            'Office'                 => 'Office',
            'Parking space'          => 'ParkingSpace',
            'Penthouse'              => 'Flat',
            'Semidetached villa'     => 'Home',
            'Storage'                => 'StorageRoom',
            'Studio'                 => 'Flat',
            'Top floor apartment'    => 'Flat',
            'Townhouse'              => 'Home',
            'Villa'                  => 'Home',
        ];
  


        if ($request->hasFile('xmlfile')) {

             


            // File Details
            $xmlFile     = $request->file('xmlfile');
            $xmlFileName = $xmlFile->getClientOriginalName();
            

            // File upload location
            $location = config('inmozon.xmlFiles');  // The folder separator '/' is included


            // Upload file
            $xmlFile->move($location, $xmlFileName);

            // Import XML to Database
             $filepath = public_path($location . $xmlFileName);
     

            // Reading file
            $xmlReader = new \XMLReader();
            $xmlReader->open('file://' . $filepath, 'utf-8');  // https://stackoverflow.com/questions/5302904/output-xmlwriter-to-xml-file



            

            while ($xmlReader->read() && $xmlReader->name != 'property') {;
            }



            $property = [];
            while ($xmlReader->name == 'property') {

                //print_r($xmlReader->readOuterXML());
                //die;

                
                
                $xmlNode = new \SimpleXMLElement($xmlReader->readOuterXML());

                echo 'aaa';

                die;
                
                $property = [
                    "propertyable_type"               => $propertyDictionary[(string) $xmlNode->type],
                    "price"                           => (float) $xmlNode->price,
                    "agency_commissions"              => 3,
                    "plf_commissions"                 => 4,
                    "community_fees"                  => 0,
                    //"description"                     => htmlentities((string) $xmlNode->desc->es, ENT_SUBSTITUTE, 'utf-8'),
                    "description"                     => htmlentities((string) $xmlNode->desc->es),
                    "location_latitude"               => (float) $xmlNode->location->latitude,
                    "location_longitude"              => (float) $xmlNode->location->longitude,
                    "location_country_id"             => 1,  // (string) $xmlNode->country,
                    "location_state_id"               => null, // ALICANTE=37  GENERALITAT VALENCIA=
                    "location_county_id"              => null, // (string) $xmlNode->province,  // ALICANTE=37
                    "location_city_id"                => null,  // (string) $xmlNode->town,
                    "location_street"                 => null,
                    "location_postcode"               => null,
                    "built_meters"                    => (float) $xmlNode->surface_area->built,
                    "bathrooms"                       => (int) $xmlNode->baths,
                    "bedrooms"                        => (int) $xmlNode->beds,
                    "built_meters_flat"               => (float) $xmlNode->surface_area->built,
                    "bathrooms_flat"                  => (int) $xmlNode->baths,
                    "bedrooms_flat"                   => (int) $xmlNode->beds,
                    "facade_flat"                     => null,
                    "floor"                           => null,      // (string) $xmlNode->type,
                    "type_flat"                       => (string) $xmlNode->type,
                    "state_flat"                      => null,
                    "type_home"                       => null, // (string) $xmlNode->type
                    "state_home"                      => null,
                    "bathrooms_home"                  => null,
                    "bedrooms_home"                   => null,
                    "built_meters_home"               => null,
                    "type"                            => null,
                    "estate"                          => null,
                    "bathrooms_countryhome"           => (int) $xmlNode->baths,
                    "bedrooms_countryhome"            => (int) $xmlNode->beds,
                    "built_meters_country"            => (float) $xmlNode->surface_area->built,
                    "state"                           => null,
                    "built_meters_office"             => null,
                    "garage"                          => null,
                    "facade"                          => null,
                    "distribution"                    => null,
                    "airconditioning"                 => null,
                    "floors"                          => null,
                    "office_exclusive_use"            => null,
                    "meters"                          => null,
                    "buildable_meters"                => null,
                    "minimum_meters"                  => null,
                    "maximum_buildable_floors"        => null,
                    "acceso_rodado"                   => null,
                    "elevator_property"               => null,
                    "energetic_certification_general" => 0,
                    "armarios"                        => null,
                    "aire"                            => null,
                    "security"                        => null,
                    "terraza"                         => null,
                    "balcon"                          => null,
                    "trastero"                        => null,
                    "garaje"                          => null,
                    "piscina"                         => ((bool) $xmlNode->pool) ? "piscina" : null,
                    "zona_verde"                      => null,
                    "agua_caliente"                   => null,
                ];

                
                //[images] => Array
                //        (
                //            [0] => https://oleinternational.com/images/viviendas/1160/g_h4fszvuoo56cpeu2or5r.JPG
                //            [1] => https://oleinternational.com/images/viviendas/1160/g_cf2mwvwgk4tj3d72f8zp.JPG
                //            [2] => https://oleinternational.com/images/viviendas/1160/g_ddko2c837kq7eue5wts6.JPG
                //            [3] => https://oleinternational.com/images/viviendas/1160/g_vc2dxa0o8t3rcvp0rmcq.JPG
                //            [4] => https://oleinternational.com/images/viviendas/1160/g_ptj5g2of67vmnaptodkh.JPG
                $property['images'] = [];
                foreach ($xmlNode->images->image as $image) {
                    $property['images'][] = (string) $image->url;
                }

                // [features] => Array
                //        (
                //            [0] => Half an hour to Alicante airport
                //            [1] => Less than 2 km. from the sea
                //            [2] => Air conditioning
                //            [3] => Furnished
                //            [4] => White goods
                //            [5] => Solarium
                $property['features'] = [];
                foreach ($xmlNode->features->feature as $feature) {
                    $property['features'][] = htmlentities((string) $feature);
                }

                $request = new \Illuminate\Http\Request($property);
                // By the way using $myRequest->query->add() you can add data to a GET request.
                $request->setMethod('post');
                $request->uploadXML = 'true';
                $this->store($request);

                $xmlReader->next('property');

                //                $request = new \Illuminate\Http\Request();
                //                echo '<pre>';
                //                print_r( $property );
                //                echo '</pre>';
                print_r($property);
            }

            $xmlReader->close();

           // return redirect('/owner/properties');
            //            dd( 'ITEMS', $property );

        }
    }

    /**
     * Centralize all ajax calls to the controller in an unique route
     * Luego ejecuta el método correpsondiente dependiendo del campo action que tiene que venir en el HTTP Request
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {

        $action = $request->input('action', null);

        switch ($action) {
            case 'deleteImage':
                return $this->deleteImage($request);
                break;

            case 'deleteDocument':
                return $this->deleteDocument($request);
                break;

            default:
                return response()->json([
                    'success' => 0,
                    'error'   => [
                        'code'    => 404,
                        'message' => 'No se han definido ninguna accion en la llamada ajax.'
                    ]
                ]);
                break;
        }
    }

    /**
     * It deletes a property image
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    private function deleteImage(Request $request)
    {

        // Respuesta JSON por defecto. Siempre es un error.
        $success  = false;
        $results  = 0;
        $response = array(
            'success' => $success,
            'error'   => array(
                'code'    => 404,
                'message' => 'No se han encontrado la imagen que coincida con los filtros solicitados.'
            )
        );

        $filters = [
            'property_id' => $request->input('property_id', -1),
            'image_id' => $request->input('item_id', -1),
        ];

        try {
            $property = Properties::findOrFail($filters['property_id']);
            $delete = $property->images()->findOrFail($filters['image_id'])->delete();

            if ($delete) {
                $success  = true;
                $results  = 1;
                $response = [
                    'message' => 'La imagen se ha borrado con exito',
                ];
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            $response = exceptionJsonMessage($exception);
        } catch (\Illuminate\Database\QueryException $exception) {
            $response = exceptionJsonMessage($exception);
        }

        return response()->json([
            'success'  => $success,
            'results'  => $results,
            'response' => $response,
        ]);
    }

    /**
     * It deletes a property document
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    private function deleteDocument(Request $request)
    {

        // Respuesta JSON por defecto. Siempre es un error.
        $success  = false;
        $results  = 0;
        $response = array(
            'success' => $success,
            'error'   => array(
                'code'    => 404,
                'message' => 'No se han encontrado un document que coincida con los filtros solicitados.'
            )
        );

        $filters = [
            'property_id' => $request->input('property_id', -1),
            'document_id' => $request->input('item_id', -1),
        ];

        try {
            $property = Properties::findOrFail($filters['property_id']);
            $delete = $property->documents()->findOrFail($filters['document_id'])->delete();

            if ($delete) {
                $success  = true;
                $results  = 1;
                $response = [
                    'message' => 'El documento se ha borrado con exito',
                ];
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            $response = exceptionJsonMessage($exception);
        } catch (\Illuminate\Database\QueryException $exception) {
            $response = exceptionJsonMessage($exception);
        }

        return response()->json([
            'success'  => $success,
            'results'  => $results,
            'response' => $response,
        ]);
    }
}
