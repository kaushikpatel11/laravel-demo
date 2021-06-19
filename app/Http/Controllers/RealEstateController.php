<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests\RealEstateRequest;
use App\Properties;
use App\RealEstate;
use App\Rating;
use App\Appointment;
use App\Owner;
use App\Services\MailService;
use Illuminate\Http\Request;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\RealEstateService;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class RealEstateController extends Controller
{
    /**
     * @var \App\Services\RealEstateService $realEstateService
     */
    protected RealEstateService $realEstateService;

    protected MailService $mailService;

    /**
     * Create a new controller instance.
     * It injects instances inside the controller.
     *
     * @param \App\Services\RealEstateService $realEstateService
     *
     * @return void
     */
    public function __construct(RealEstateService $realEstateService, MailService $mailService)
    {
        $this->realEstateService = $realEstateService;
        $this->mailService = $mailService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $real_estates = RealEstate::all();

        return view('backend.realestate.realestate_list', ['real_estates' => $real_estates]);
    }

    public function properties()
    {

        //propiedades activas en las zonas de la inmobiliaria
        $properties = $this->realEstateService->propertiesByZones(Auth::user()->real_estate);
        //propiedades favoritas
        $fav_properties = Auth::user()->real_estate->fav_properties->sortByDesc('updated_at');
        foreach ($properties as $property) {
            $property->show_button = true;
            foreach ($fav_properties as $fav) {
                if ($property->property_id == $fav->id) {
                    $property->show_button = false;
                }
            }
        }


        foreach ($properties as $i => $property) {

            $properties[$i]->calculated_commission = $properties[$i]->price * $properties[$i]->agency_commissions*0.01;
            $owner = Owner::find($properties[$i]->owner_id);
            if($owner->type=='agente' && $properties[$i]->calculated_commission<2000)
                $properties[$i]->calculated_commission = 2000;
            elseif($owner->type!='agente' && $properties[$i]->calculated_commission<3000)
                $properties[$i]->calculated_commission = 3000;

            $properties[$i]->calculated_commission = number_format($properties[$i]->calculated_commission , 2, ',', '.');
            $properties[$i]->agency_commissions = number_format(($properties[$i]->agency_commissions), 2, ',', '.');
            $properties[$i]->price = number_format(($properties[$i]->price), 0, ',', '.');

            if($properties[$i]->operation=='rent'){
                $properties[$i]->agency_commissions = 'Ver detalle';
                $properties[$i]->calculated_commission = 'Ver detalle';
            }

        }

        return view('backend.realestate.property_list', ['properties' => $properties]);
    }

    public function limitedPropertyDetail($id)
    {

        //todo enviar solo campos reducidos
        $property = Properties::find($id);

        //todo polymoprh
        $property_subtype = null;
        switch ($property->property_type) {
            case "Flat":
                $property_subtype = $property->flat;
                break;
            case "Home/Chalet":
                $property_subtype = $property->home;
                break;
            case "Country home":
                $property_subtype = $property->country_home;
                break;
            case "Office":
                $property_subtype = $property->office;
                break;
            case "Land":
                $property_subtype = $property->land;
                break;
        }

        if ($property != null && $property_subtype != null) {
            return view(
                'properties.limited_detail',
                [
                    'edit_active'      => false,
                    'property_subtype' => $property_subtype,
                    'property'         => $property,
                ]
            );
        } else {
            return redirect('/real_estate/dashboard')->with('error', 'No se puede mostrar la vista ');
        }
    }

    public function favorites()
    {
        // $properties = Properties::paginate(15);
        $fav_properties        = Auth::user()->real_estate->fav_properties;
        $fav_active_properties = [];
        foreach ($fav_properties as $property) {
            if ($property->historical->last()->status_id == 2) {
                array_push($fav_active_properties, $property);
            }
        }
        foreach ($fav_active_properties as $property) {
            $property->show_button = true;
            foreach ($fav_active_properties as $fav) {
                if ($property->id == $fav->id) {
                    $property->show_button = false;
                }
            }
        }

        for ($i = 0; $i < count($fav_active_properties); $i++) {
            $fav_active_properties[$i]->calculated_commission = $fav_active_properties[$i]->price * $fav_active_properties[$i]->agency_commissions * 0.01;
            $fav_active_properties[$i]->calculated_commission = number_format($fav_active_properties[$i]->calculated_commission, 2, ",", ".");
            $fav_active_properties[$i]->price = number_format($fav_active_properties[$i]->price, 2, ",", ".");
            $fav_active_properties[$i]->agency_commissions = number_format($fav_active_properties[$i]->agency_commissions, 2, ",", ".");

            if($fav_active_properties[$i]->operation=='rent'){
                $fav_active_properties[$i]->agency_commissions = 'Ver detalle';
                $fav_active_properties[$i]->calculated_commission = 'Ver detalle';
            }
        }

        return view('backend.realestate.property_list', ['properties' => $fav_active_properties]);
    }

    public function real_estates()
    {
        $real_estates = RealEstate::all();
        return view('backend/realestate/realestate_list', ['real_estates' => $real_estates]);
    }

    public function ficha($id_property)
    {
        try {

            $property     = Properties::find($id_property);
            // $property     = Auth::user()->real_estate->ficha;
            //$appointments = Appointment::where('card_id', $id_property)->get();
            $appointments = DB::table('appointments')
                ->leftJoin('cards', 'appointments.card_id', '=', 'cards.id')
                ->where('cards.real_estate_id', '=', Auth::user()->real_estate->id)
                ->where('cards.property_id', '=', $id_property)
                ->orderByDesc('appointments.created_at')
                ->get();

            $card_id = DB::table('appointments')
                ->select('cards.id')
                ->rightJoin('cards', 'appointments.card_id', '=', 'cards.id')
                ->where('cards.real_estate_id', '=', Auth::user()->real_estate->id)
                ->where('cards.property_id', '=', $id_property)
                ->orderByDesc('appointments.created_at')
                ->get()[0]->id;
            if ($property == null) {
                return back()->withErrors(['Error: no existe esta ficha']);
            }

            $property->card_id = $card_id;

            /*$card_id = DB::table('cards')
                ->select('id')
                //->where('real_estate_id', Auth::user()->real_estate->id)
                ->where('property_id', '$id_property')
                ->get();*/
            return view(
                'backend.realestate.ficha_detail',
                ['property' => $property],
                ['appointments' => $appointments]
            );
        } catch (Exception $e) {
            return back()->withErrors(['Error: al leer la ficha' . $e->getMessage()]);
        }
    }

    public function fichas()
    {
        $properties = Auth::user()
            ->real_estate
            ->ficha;
        return view('backend.realestate.fichas', ['properties' => $properties]);
    }


    public function abrirFicha(Request $request)
    {

        $real_estate = Auth::user()->real_estate;
        $property    = Properties::find($request->property_id_hidden);

        //si ya tiene ficha no añadir de nuevo
        if (DB::table('cards')
            ->where([
                ['real_estate_id', '=', $real_estate->id],
                ['property_id', '=', $property->id],
            ])->doesntExist()
        ) {

            $real_estate->ficha()->attach($property->id);
            $this->sendMailOpenCard($property->id, $real_estate->id);
        }

        return back();
    }


    public function sendMailOpenCard($property_id, $reID)
    {
        //se manda un correo despues de pedir una cita
        try {
            $property = Properties::findOrFail($property_id);
            $owner = $property->owner;
            $re = RealEstate::find($reID);

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
                'subject'  => 'Inmozon: ficha abierta',
                'view'     => 'emails.emailFichaAbierta',
                'params'   => array(
                    'id' => $property->id,
                    'ref' => $property->ref,
                    'owner_name' => $owner->name,
                    'street' => $property->location->street,
                    'city' => $property->location->city->name,
                    'price' => $property->price,
                    'commercialName' => $re->commercial_name,
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

    public function sendMailToOwnerPropertyToFavorites($property_id)
    {
        //se manda un correo despues de pedir una cita
        try {
            $property = Properties::findOrFail($property_id);
            $owner = $property->owner;
            $re = Auth::user()->real_estate;

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
                'subject'  => trans('Inmozon: '). $property_promotion .trans(' añadida a favoritos'),
                'view'     => 'emails.emailPropertyToFav',
                'params'   => array(
                    'owner_name' => $owner->name,
                    'street' => $property->location->street,
                    'city' => $property->location->city->name,
                    'business_name' => $re->commercial_name,
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

    public function addToFav($id)
    {
        try{
            $real_estate = Auth::user()->real_estate;
            $property    = Properties::find($id);

            //si ya esta en favoritos no añadir de nuevo
            if (DB::table('retail_favorites_properties')
                ->where([
                    ['real_estate_id', '=', $real_estate->id],
                    ['property_id', '=', $property->id],
                ])->doesntExist()
            ) {

                $real_estate->fav_properties()->attach($property->id);
                $this->sendMailToOwnerPropertyToFavorites($id);
            }

            return redirect()->route('real_estate.properties')->with('success', 'Propiedad añadida a favoritos correctamente');
        }catch(Exception $e){
                return back()->withErrors(['Error al añadir la propiedad a favoritos']);
        }

    }

    public function removeFromFav($id)
    {
        $property = Properties::find($id);
        $property->real_estates()->detach(Auth::user()->real_estate->id);
        $property->save();
        return back();
    }


    public function countPropertiesInZone()
    {
        //Auth::user()->real_estate->zones
    }

    public function countFavProperties()
    {

        //ultimo historico de todas las propiedades
        $last_historical = DB::table('historical_lines')
            ->select(DB::raw('MAX(historical_lines.id) as max_historical_id'), 'historical_lines.property_id as historical_property_id')
            ->groupBy('historical_lines.property_id');

        $result =  DB::table('retail_favorites_properties as favs')
            //filtrar por status validada
            ->joinSub($last_historical, 'last_historical', function ($join) {
                $join->on('last_historical.historical_property_id', '=', 'favs.property_id');
            })
            ->join('historical_lines', 'historical_lines.id', '=', 'last_historical.max_historical_id')
            ->where('historical_lines.status_id', '=', 2)
            ->where('favs.real_estate_id', Auth::user()->real_estate->id)
            ->count();

        return $result;
    }


    public function countPropertiesByZones()
    {
        $realEstate = Auth::user()->real_estate;
        $totalProperties = $this->realEstateService->countPropertiesByZones($realEstate);
        return $totalProperties;
    }
    public function countPropertiesByZonesByMonth()
    {
        $realEstate = Auth::user()->real_estate;
        $totalProperties = $this->realEstateService->countPropertiesByZonesByMonth($realEstate);
        return $totalProperties;
    }
/*
    public function nextAppointments()
    {

        $appointments2 = DB::table('appointments')
            ->select('*')
            ->join('cards', 'cards.id', '=', 'appointments.card_id')
            ->leftJoin('properties', 'properties.id', '=', 'cards.property_id')
            ->where('cards.real_estate_id', Auth::user()->real_estate->id)
            ->orderBy('appointments.date', 'desc')
            ->where('appointments.date', '<', Carbon::today())
            ->limit(3);

        $appointments = DB::table('appointments')
            ->select('*')
            ->join('cards', 'cards.id', '=', 'appointments.card_id')
            ->leftJoin('properties', 'properties.id', '=', 'cards.property_id')
            ->where('cards.real_estate_id', Auth::user()->real_estate->id)
            ->orderBy('appointments.date', 'asc')
            ->where('appointments.date', '>=', Carbon::today())
            ->limit(5)
            ->union($appointments2)
            ->get()
            ->sortByDesc('date');
        return $appointments;
    }
*/

    public function nextAppointments()
    {
        $appointments = DB::table('appointments')
            ->select('*')
            ->join('cards', 'cards.id', '=', 'appointments.card_id')
            ->leftJoin('properties', 'properties.id', '=', 'cards.property_id')
            ->where('cards.real_estate_id', Auth::user()->real_estate->id)
            ->orderBy('appointments.date', 'asc')
            ->where('appointments.date', '>', Carbon::now())
            ->limit(10)
            ->get()
            ->sortByDesc('date');
        return $appointments;
    }

    public function dashboard()
    {

        return view(
            'backend.realestate.dashboard_realestate',
            [
                'fav_count' => $this->countFavProperties(),
                'appointments' => $this->nextAppointments(),
                'count_properties' => $this->countPropertiesByZones(),
                'count_properties_by_month' => $this->countPropertiesByZonesByMonth(),
                'title' => "Año ". Carbon::now()->year
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();  // Only Spain by now, 1 record
        return view('backend.realestate.create_realestate', ['countries' => $countries, 'edit_active' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\RealEstateRequest $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function store(RealEstateRequest $request)
    {


        try {
            //dd($request->all());
            /*
            $validatedData = $request->validate([
                'location_latitude' => 'required',
                'location_longitude' => 'required',
            ]);*/

            //$request->status='0';

            $realEstate = $this->realEstateService->update(-1, $request);
            Session::flash('success', 'Los datos de la inmobiliaria han sido creados.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            Session::flash('danger', $exception->getMessage());
        } catch (\Illuminate\Database\QueryException $exception) {
            Session::flash('danger', $exception->getMessage());
        } catch (Exception $e) {
            return back()->withErrors(['Error al guardar los datos de la inmobiliaria' . $e->getMessage()]);
        }
        return redirect('/real_estate/dashboard')->with('success', 'Agencia inmobiliaria creada correctamente');
        //return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user        = Auth::user();
        $real_estate = $user->real_estate;
        return $this->edit($real_estate->id);

        // @TODO @DCA 2020-08-26 return original, se podria elilminar el fichero de la vista y esta linea
        //        return view('backend.realestate.datos_realestate', ['real_estate' => $real_estate, 'user' => $user]);
    }

    public function showRealEstate($id)
    {
        try {
            return $this->edit($id, false);
        } catch (Exception $e) {
            return back()->withErrors(['Error al mostrar la inmobiliaria' . $e->getMessage()]);
        }
    }

    public function comment($id, Request $request)
    {
        try {
            //si entro como propietario
            //y este propietario tiene ficha abierta con alguna de sus propiedades en esta inmobiliaria
            $ficha = Auth::user()->owner->fichas->where('real_estate_id', '=', $id)->first();
            if (Auth::user()->type == "owner" && $ficha->exists()) {
                //dd($request);
                Rating::create(
                    [
                        'card_id'      => $ficha->id,
                        'comment_key'  => implode(';', $request->param),
                        'rating'       => $request->rating,
                        'open_comment' => $request->open_comment,
                    ]
                );

                return redirect()->to('/owner/real_estates');
            }
        } catch (Exception $e) {
            return back()->withErrors(['Error al comentar la inmobiliaria' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id ID from the RealEstate.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @return \Illuminate\View\View
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function edit($id, $edit_active = true)
    {

        try {
            //            $lançje = 'es';
            $realEstate = $this->realEstateService->find($id);
            $user_email = User::find($realEstate['real_estate']['user_id'])->email;
            $realEstate['real_estate']['user_email'] = $user_email;
            $countries  = Country::all();  // Only Spain by now, 1 record
            $comments = DB::table('rating_comments')->select(['id', 'key', 'es'])->get();

            // @TODO @DCA 2020-08-31 refactorizado dentro $realEstate = $this->realEstateService->find($id);
            ///////////   traducir los comentarios cerrados para todos los rating de 1 real_estate   ////////////////////
            //            $i = 0;
            //            foreach ($realEstate['ratings'] as $rating) {
            //                $keys = explode(';', $rating['comment_key']);
            //                $translations = "";
            //                foreach ($keys as $key) {
            //                    $translations .= (DB::table('rating_comments')->where('key', '=', $key)->get()[0]->$languaje) . ". ";
            //                }
            //
            //                $rating['comment_key_translated'] = $translations;
            //                $realEstate['ratings'][$i++] = $rating;
            //            }
            ////////////////////////////

            //$real_estate->rating = number_format($real_estate->ratings->avg('rating'), 1);


            //mostrar boton añadir comentario
            //si entro como propietario
            //y este propietario tiene ficha abierta con alguna de sus propiedades en esta inmobiliaria
            //            if (
            //                Auth::user()->type == "owner" &&
            //                Auth::user()->owner->fichas->where('real_estate_id', '=', $id)->first()->exists()
            //            ) {
            //                $show_create_rating_button = true;
            //            }

            /*
            $show_create_rating_button = ('owner' == Auth::user()->type
            //primero se comprueba que hay ficha abierta antes de hacer where
            //, sino da un error de variable no definida
                && isset(Auth::user()->owner->fichas)
                && Auth::user()->owner->fichas->where('real_estate_id', $id)->first()
                ->exists());*/

            $show_create_rating_button = false;
            if (('owner' == Auth::user()->type)
                && isset(Auth::user()->owner->fichas)
                //&& Auth::user()->owner->fichas->where('real_estate_id', $id)->first()->exists())
                && count(Auth::user()->owner->fichas->where('real_estate_id', '=', $id)) > 0
            ) {
                $show_create_rating_button = true;
            }

            ////////////
            return view('backend.realestate.create_realestate')->with([
                'item'                      => $realEstate,
                'countries'                 => $countries,
                'comments'                 => $comments,
                'rating' => number_format(collect($realEstate['ratings'])->avg('rating'), 1),
                'show_create_rating_button' => $show_create_rating_button,
                'edit_active'             => $edit_active,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            \Log::error($exception);
            Session::flash('danger', $exception->getMessage());
        } catch (\Illuminate\Database\QueryException $exception) {
            \Log::error($exception);
            Session::flash('danger', $exception->getMessage());
        } catch (Exception $e) {
            return back()->withErrors(['Error al mostrar vista editar inmobiliaria' . $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\RealEstateRequest $request
     * @param int                                  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function update(RealEstateRequest $request, $id)
    {
        try {

            $realEstate = $this->realEstateService->update($id, $request);
            //Session::flash('success', 'Datos de la inmobiliaria actualizados.');
            return back()->with('success', 'Datos modificados correctamente');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            Session::flash('danger', $exception->getMessage());
        } catch (\Illuminate\Database\QueryException $exception) {
            Session::flash('danger', $exception->getMessage());
        }

        return redirect()->back();
    }


    public function updateRealEstate(Request $request)
    {
        //
        $request->validate([
            'name'       => 'required',
            'vat_number' => 'required',
            'phone_1'    => 'required',
        ]);
        //

        $real_estate                = Auth::user()->real_estate;
        $real_estate->business_name = $request->business_name;
        $real_estate->name          = $request->name;
        $real_estate->surname       = $request->surname;
        $real_estate->vat_number    = $request->vat_number;
        $real_estate->phone_1       = $request->phone_1;
        $real_estate->postcode      = $request->postcode;
        $real_estate->locality      = $request->locality;
        $real_estate->county        = $request->county;
        $real_estate->origin        = $request->origin;
        $real_estate->save();

        //if error, redirect with error
        return redirect('/real_estate/dashboard')->with('success', 'Propietario modificado correctamente');
    }

    public function createRating($id)
    {
        //
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
    }

    /**
     * Google Maps
     * Send a JSON response with all the properties
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonProperties()
    {
        $properties = Properties::all();
        $properties = $properties->filter(function ($elem) {
            return $elem->historical->last()->status_id == 2;
        });

        $data = [];
        foreach ($properties as $property) {
            $location = $property->location;
            $avatar   = (!is_null($property->images()->first())) ? $property->images()->first()->url : 'upload/images/default_property.jpg';
            if (!is_null($location) && !empty($location)) {
                $data[] = [
                    'type'       => 'property',
                    'id'         => $property->id,
                    'url_edit'        => route('property.show', ['id' => $property->id]),
                    'url_detail'        => route('property.detail', ['id' => $property->id]),
                    'attributes' => [
                        'price'       => number_format($property->price, '2', ',', '.'),
                        'description' => $property->description,
                        'city_name'   => $location->city->name,
                        'county_name' => $location->county->name,
                        'avatar'      => asset($avatar),
                    ],
                    'geometry'   => [
                        'latitude'  => $location->latitude,
                        'longitude' => $location->longitude,
                    ],
                ];
            } else {
                $data[] = [
                    'type'       => 'property',
                    'id'         => $property->id,
                    'url_edit'        => route('real_estate.property.detail', ['id' => $property->id]),
                    'url_detail'        => route('property.detail', ['id' => $property->id]),
                    'attributes' => [
                        'price'       => $property->price,
                        'description' => $property->description,
                        'city_name'   => null,
                        'county_name' => null,
                        'avatar'      => $_SERVER['DOCUMENT_ROOT'] . $avatar,
                    ],
                    'geometry'   => [
                        'latitude'  => config('inmozon.defaultLocation.latitude'),
                        'longitude' => config('inmozon.defaultLocation.longitude'),
                    ],
                ];
            }
        }

        return response()->json([
            'success'  => true,
            'results'  => count($data),
            'response' => $data,
        ]);
    }
}
