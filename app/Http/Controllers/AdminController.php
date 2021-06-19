<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Admin;
use App\HistoricalLine;
use App\Owner;
use App\Properties;
use App\RealEstate;
use App\Flat;
use App\Home;
use App\Land;
use App\ParkingSpace;
use App\StorageRoom;
use App\CommercialProperty;
use App\Office;
use App\CountryHome;
use App\User;
use App\Config;
use App\Exports\FichasExport;
use App\Ficha;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\MailService;
use Illuminate\Auth\Events\Registered;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Builder\Property;

class AdminController extends Controller
{


    protected MailService $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService  = $mailService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //todo fichas abiertas en el ultimo mes
        return redirect('/admin/dashboard');
    }

    public function info()
    {
        return view('backend/admin/info');
    }


        
    public function sendMailToInfo(Request $request)
    {
        //se manda un correo despues de pedir una cita
        try {
            //almacenar idioma de la aplicacion
            $previousLocale = app()->getLocale();
            //cambiar al idioma de la inmobiliaria para mandar el email
            app()->setLocale('es');

            $user= Auth::user();
            $mailData = array(
                'from' => array(
                    'name'    => 'Inmozon',
                    //password: @inmozon.inmo
                    'address' => 'web@inmozon.com'
                ),
                'subject'  => 'Inmozon: contacto de usuario',
                'view'     => 'emails.emailContact',
                'params'   => array(
                    'id_user' => $user->id,
                    'email' => $user->email,
                    'subject' => $request->subject,
                    'info_text' => $request->info_text,
                ),

                'to'   => 'info@inmozon.com',
                'cc'   => [],
                'bcc'  => [],
            );

            $dd = $this->mailService->send($mailData);
            app()->setLocale($previousLocale);
            
            return back()->with('success', 'Mensaje enviado, pronto nuestros agentes lo revisarán y se pondrán en contacto');
        } catch (Exception $e) {
            return back()->withErrors(['error' . $e->getMessage()]);
        }
    }
    
    public function fichas()
    {
        $properties = Properties::select('*', 'properties.id as property_id', 'cards.real_estate_id as card_real_estate_id', 'cards.id as card_id', 'cards.created_at as card_created_at')
            ->join('cards', 'cards.property_id', '=', 'properties.id')
            ->leftJoin('real_estates', 'real_estates.id', '=', 'cards.real_estate_id')
            ->leftJoin('owners', 'owners.id', '=', 'properties.owner_id')
            //->leftJoin('locations', 'locations.locationable_id', '=', 'properties.id')
            //->leftJoin('city', 'locations.locationable_id', '=', 'properties.id')
            ->get();

        
        
        return view('backend.admin.fichas_admin', ['properties' => $properties]);
    }

    public function export() 
    {
        return Excel::download(new FichasExport, 'fichas_abiertas.csv');
        //return (new FichasExport)->download('fichas_abiertas.csv', Excel::CSV);
    }

    private function countActiveRealEstate()
    {
        $result =  DB::table('real_estates')
            ->select(DB::raw('count(real_estates.id) as re_number'))
            ->where('real_estates.status', 3)
            ->count();
        
        return $result;
    }

    private function countNewRealEstate($year)
    {
        $result_formatted = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $result =  DB::table('real_estates')
            ->select(DB::raw('count(real_estates.id) as re_number'),
                DB::raw('MONTH(real_estates.created_at) as mo'),
                DB::raw('YEAR(real_estates.created_at) as year'))
            ->groupBy('mo','year')
            
            ->get()
            ->filter(function($item, $key) use ($year){
                return $item->year == $year;
            })->each(function($item, $key) use (&$result_formatted){
                
                $result_formatted[$item->mo-1] = $item->re_number;
            });
        
        return $result_formatted;
    }

    private function countNewProperties($year)
    {
        $result_formatted = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 ];

        $result =  DB::table('properties')
            ->select(DB::raw('count(properties.id) as prop_numb'), 
            DB::raw('MONTH(properties.created_at) as mo'),
            DB::raw('YEAR(properties.created_at) as year'),)
            ->groupBy('mo', 'year')
            ->get()
            ->filter(function($item, $key) use ($year){
                return $item->year == $year;
            })->each(function($item, $key) use (&$result_formatted){
                
                $result_formatted[$item->mo-1] = $item->prop_numb;
            });

        return $result_formatted;
    }

    private function countActiveProperties($year)
    {

        $result_formatted = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 ];

        //sacamos el ultimo historico
        $last_historical = DB::table('historical_lines')
            ->select(DB::raw('MAX(historical_lines.id) as max_historical_id'), 'historical_lines.property_id')
            ->groupBy('historical_lines.property_id');

        //join a la misma tabla filtramos por status=2 (activa)
        //conseguimos las propiedades con su ultimo estado = 2 y hacemos count
        //agrupamos por mes
        $result = DB::table('historical_lines')
            ->select(
                DB::raw('count(historical_lines.id) as count_properties'),
                DB::raw('MONTH(historical_lines.updated_at) as mo'),
                DB::raw('YEAR(historical_lines.updated_at) as year'),

            )
            ->joinSub($last_historical, 'last_historical', function ($join) {
                $join->on('last_historical.max_historical_id', '=', 'historical_lines.id');
            })
            ->where('historical_lines.status_id', '=', 2)
            //agrupamos por mes
            ->groupBy('mo', 'year')
            ->get()
            ->filter(function($item, $key) use ($year){
                return $item->year == $year;
            })->each(function($item, $key) use (&$result_formatted){
                
                $result_formatted[$item->mo-1] = $item->count_properties;
            });
        
        return $result_formatted;
    }

    private function countDeactivatedProperties($year)
    {
        $result_formatted = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        //sacamos el ultimo historico
        $last_historical = DB::table('historical_lines')
            ->select(DB::raw('MAX(historical_lines.id) as max_historical_id'),'historical_lines.property_id')
            ->groupBy('historical_lines.property_id');

        //join a la misma tabla filtramos por status=2 (activa)
        //conseguimos las propiedades con su ultimo estado = 2 y hacemos count
        //agrupamos por mes
        $result = DB::table('historical_lines')
            ->select(
                DB::raw('count(historical_lines.id) as count_properties'),
                DB::raw('MONTH(historical_lines.updated_at) as mo'),
                DB::raw('YEAR(historical_lines.updated_at) as year'),
            )
            ->joinSub($last_historical, 'last_historical', function ($join) {
                $join->on('last_historical.max_historical_id', '=', 'historical_lines.id');
            })
            ->where('historical_lines.status_id', '=', 4)
            
            //agrupamos por mes
            ->groupBy('mo', 'year')
            ->get()
            ->filter(function($item, $key) use ($year){
                return $item->year == $year;
            })->each(function($item, $key) use (&$result_formatted){
                
                $result_formatted[$item->mo-1] = $item->count_properties;
            });
          
        return $result_formatted;
    }



    private function countOpenCards($year)
    {
        $result_formatted = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 ];

        //numero de aperturas de ficha por mes
        $result =  DB::table('cards')
            ->select(DB::raw('count(cards.real_estate_id) as re_number'), 
            DB::raw('MONTH(cards.created_at) as mo'),
            DB::raw('YEAR(cards.created_at) as year'))
            ->leftJoin('properties', 'properties.id', '=', 'cards.property_id')
            ->groupBy(DB::raw('MONTH(cards.created_at) '), 'year')
            ->get()
            ->filter(function($item, $key) use ($year){
                return $item->year == $year;
            })->each(function($item, $key) use (&$result_formatted){
                $result_formatted[$item->mo-1] = $item->re_number;
            });

        return $result_formatted;
    }


public function countPropertiesByStatus($status){
    //1 sin validar, 2 activa, 3 cancelada, 4desactivada,
    //5 en proceso inmozon, 6 en proceso propietario
    //7 vendida

    /*Total de viviendas por estado*/
    //->where('max_historical_id', '=', 6);
    //->groupBy('historical_lines.property_id')
    //sacamos el ultimo historico
    $last_historical = DB::table('historical_lines')
        ->select(DB::raw('MAX(historical_lines.id) as max_historical_id'), 'historical_lines.property_id')
        ->groupBy('historical_lines.property_id');

    //join a la misma tabla filtramos por status=2 (activa)
    //conseguimos las propiedades con su ultimo estado = 2 y hacemos count
    //agrupamos por mes
    $last_historical_count = DB::table('historical_lines')
        ->joinSub($last_historical, 'last_historical', function ($join) {
            $join->on('last_historical.max_historical_id', '=', 'historical_lines.id');
        })
        ->join('properties', 'properties.id', '=', 'historical_lines.property_id')
        ->whereNull('properties.deleted_at')
        ->where('historical_lines.status_id', '=', $status)
        ->count();

    return $last_historical_count;
}

    public function dashboard()
    {
        $year = app('request')->input('year') ?? Carbon::now()->year;
        $properties_by_type = array();
        array_push($properties_by_type, Flat::all()->count());
        array_push($properties_by_type, Home::all()->count());
        array_push($properties_by_type, Office::all()->count());
        array_push($properties_by_type, Land::all()->count());
        array_push($properties_by_type, CountryHome::all()->count());
        array_push($properties_by_type, ParkingSpace::all()->count());
        array_push($properties_by_type, StorageRoom::all()->count());
        array_push($properties_by_type, CommercialProperty::all()->count());


        //numero de owners por tipo
        //particulares, promotores, inmobiliarias
        $owner_types = array();

        $owner_types[0]['valor'] = Owner::where('type', '=', 'particular')->count();
        $owner_types[0]['tipo'] = 'Particular';

        $owner_types[1]['valor'] = Owner::where('type', '=', 'promotor')->count();
        $owner_types[1]['tipo'] = 'Promotor';

        $owner_types[2]['valor'] = Owner::where('type', '=', 'inmobiliaria')->count();
        $owner_types[2]['tipo'] = 'Inmobiliaria';


         $last_historical_count1 = $this->countPropertiesByStatus(1);
         $last_historical_count2 = $this->countPropertiesByStatus(2);
         $last_historical_count3 = $this->countPropertiesByStatus(3);
         $last_historical_count4 = $this->countPropertiesByStatus(4);
         $last_historical_count5 = $this->countPropertiesByStatus(5);
         $last_historical_count6 = $this->countPropertiesByStatus(6);
         $last_historical_count7 = $this->countPropertiesByStatus(7);
        //@TODO fichas abiertas en el ultimo mes

        $count_fichas_mes = DB::select("SELECT COUNT(id) AS DATA, YEAR(created_at) year, MONTH(created_at) month FROM cards GROUP BY YEAR, MONTH");
        $active_re = $this->countActiveRealEstate();
        $active_properties = $this->countActiveProperties($year);
        $new_real_estate = $this->countNewRealEstate($year);
        $new_properties = $this->countNewProperties($year);
        $deactivated_properties = $this->countDeactivatedProperties($year);
        $count_open_cards = $this->countOpenCards($year);
        $title = $year;

        return view(
            'backend/admin/dashboard_admin',
            compact(
                'count_open_cards',
                'deactivated_properties',
                'new_properties',
                'new_real_estate',
                'active_properties',
                'active_re',
                'count_fichas_mes',
                'properties_by_type',
                'last_historical_count1',
                'last_historical_count2',
                'last_historical_count3',
                'last_historical_count4',
                'last_historical_count5',
                'last_historical_count6',
                'last_historical_count7',
                'title'
            )
        );
    }

    public function deleteProperty($id){
        try{
            Properties::find($id)->delete();
            return redirect()->route('admin.properties')->with('success', 'Propiedad eliminada correctamente');
        }catch(Exception $e){
            if (config('app.debug'))
                return redirect()->route('admin.properties')->withErrors(['Error al borrar la propiedad'.$e->getMessage()]);
            else
                 return redirect()->route('admin.properties')->withErrors(['Error al borrar la propiedad']);
        }
    }

    public function properties()
    {
        $properties = Properties::all()->sortByDesc('updated_at');

        for ($i = 0; $i < count($properties); $i++) {
            $properties[$i]->calculated_commission = $properties[$i]->price * $properties[$i]->agency_commissions*0.01;
            if($properties[$i]->owner->type=='agente' && $properties[$i]->calculated_commission<2000)
                $properties[$i]->calculated_commission = 2000;
            elseif($properties[$i]->owner->type!='agente' && $properties[$i]->calculated_commission<3000)
                $properties[$i]->calculated_commission = 3000;
            
            $properties[$i]->calculated_commission = number_format($properties[$i]->calculated_commission , 2, ',', '.');
            $properties[$i]->agency_commissions = number_format(($properties[$i]->agency_commissions), 2, ',', '.');
            $properties[$i]->price = number_format(($properties[$i]->price), 0, ',', '.');

            if($properties[$i]->operation=='rent'){
                $properties[$i]->agency_commissions = 'Ver detalle';
                $properties[$i]->calculated_commission = 'Ver detalle';
            }
/*
            if($properties[$i]->propertyable_type == 'App\\Promotion'  )
                $properties[$i]->agency_commissions = $properties[$i]->propertyable->promotion_agency_commissions;*/
            //$properties[$i]->calculated_commission = $properties[$i]->price * $properties[$i]->agency_commissions * 0.01;
        }
        return view('backend.admin.property_list', ['properties' => $properties]);
    }

    public function propertiesInProcess()
    {
        //ultimos historicos de todas las propiedades
        $last_historical = DB::table('properties')
            ->join('historical_lines', 'properties.id', '=', 'historical_lines.property_id')
            ->join('statuses', 'historical_lines.status_id', '=', 'statuses.id')
            ->select(DB::raw('MAX(historical_lines.id) as max_historical_id'), 'historical_lines.property_id')
            ->groupBy('historical_lines.property_id');

        $properties = DB::table('historical_lines')->select(
            'properties.*',
            'properties.id as property_id',
            'locations.*',
            'cities.name as city_name',
            'counties.name as county_name',
            'statuses.name as status'
        )
            //mediante este join cojemos los status_id del ultimo historico de cada propiedad
            ->joinSub($last_historical, 'last_historical', function ($join) {
                $join->on('last_historical.max_historical_id', '=', 'historical_lines.id');
            })
            //tabla propiedades
            ->join('properties', 'properties.id', '=', 'last_historical.property_id')
            ->join('statuses', 'statuses.id', '=', 'historical_lines.status_id')
            ->join('locations', 'locationable_id', '=', 'properties.id')
            ->join('cities', 'cities.id', '=', 'locations.city_id')
            ->join('counties', 'counties.id', '=', 'locations.county_id')
            ->where('locations.locationable_type', '=', 'App\Properties')
            //propiedades que cumplen con status_id=1 -> sin validar
            ->where('historical_lines.status_id', '=', 5)
            ->orderByDesc('properties.updated_at')
            ->get()
            ->unique('property_id');
        return view('backend.admin.property_validate_list', ['properties' => $properties]);
    }

    public function validateProperties()
    {
        //ultimos historicos de todas las dash
        $last_historical = DB::table('properties')
            ->join('historical_lines', 'properties.id', '=', 'historical_lines.property_id')
            ->join('statuses', 'historical_lines.status_id', '=', 'statuses.id')
            ->select(DB::raw('MAX(historical_lines.id) as max_historical_id'), 'historical_lines.property_id')
            ->groupBy('historical_lines.property_id');

        $properties = DB::table('historical_lines')
            ->select(
                'properties.*',
                'properties.id as property_id',
                'locations.*',
                'cities.name as city_name',
                'counties.name as county_name',
                'statuses.name as status'

            )
            //mediante este join cojemos los status_id del ultimo historico de cada propiedad
            ->joinSub($last_historical, 'last_historical', function ($join) {
                $join->on('last_historical.max_historical_id', '=', 'historical_lines.id');
            })
            //tabla propiedades
            ->join('properties', 'properties.id', '=', 'last_historical.property_id')
            ->join('locations', 'locationable_id', '=', 'properties.id')
            ->join('cities', 'cities.id', '=', 'locations.city_id')
            ->join('counties', 'counties.id', '=', 'locations.county_id')
            ->join('statuses', 'statuses.id', '=', 'historical_lines.status_id')
            ->where('locations.locationable_type', '=', 'App\Properties')
            //propiedades que cumplen con status_id=1 -> sin validar
            ->where('historical_lines.status_id', '=', 1)
            ->whereNull('properties.deleted_at')
            ->orderByDesc('properties.updated_at')
            ->get();
        return view('backend.admin.property_validate_list', ['properties' => $properties]);
    }

    public function admin_list()
    {
        $admins = Admin::all();
        return view('backend/admin/admin_list', ['admins' => $admins]);
    }

    public function owner_list()
    {
        $owners = Owner::all();
        return view('backend/admin/owner_list', ['owners' => $owners]);
    }

    public function real_estate_list()
    {

        $average_rating = DB::table('real_estates')
            ->select('real_estates.id as re_id', DB::raw('AVG(rating) as avg_rating'), DB::raw('COUNT(rating) as rating_count'))
            ->leftJoin('cards', 'cards.real_estate_id', '=', 'real_estates.id')
            ->leftJoin('ratings', 'cards.id', '=', 'ratings.card_id')
            ->groupBy('real_estates.id');

        $real_estates = DB::table('real_estates')
            ->joinSub($average_rating, 'avg_rating', function ($join) {
                $join->on('avg_rating.re_id', '=', 'real_estates.id');
            })
            ->leftJoin('users', 'users.id', '=', 'real_estates.user_id')
            ->get();


        foreach ($real_estates as $real_estate) {
            $real_estate->avg_rating = number_format($real_estate->avg_rating, 1);
            $real_estate->street = RealEstate::find($real_estate->re_id)->locations->first()->street;
            $real_estate->city = RealEstate::find($real_estate->re_id)->locations->first()->city->name;
            $real_estate->county = RealEstate::find($real_estate->re_id)->locations->first()->county->name;
        }

        // dd($real_estates);
        return view('backend/admin/realestate_list', ['real_estates' => $real_estates]);
    }

    public function to_trial_real_estate(Request $request, $id)
    {
        try {

            $re = RealEstate::find($id);
            $re->status = '1';
            $re->save();
            return redirect('/admin/real_estates')->with('succes', 'Inmobiliaria pasada a version de prueba correctamente');
        } catch (Exception $e) {

            return back()->withErrors(['Error al activar esta inmobiliaria']);
        }
    }

    public function validate_real_estate(Request $request, $id)
    {
        try {

            $re = RealEstate::find($id);
            $re->status = '2';
            $re->save();
            return redirect('/admin/real_estates')->with('succes', 'Inmobiliaria validada correctamente');
        } catch (Exception $e) {

            return back()->withErrors(['Error al activar esta inmobiliaria']);
        }
    }
    public function deactivate_real_estate(Request $request, $id)
    {
        try {

            $re = RealEstate::find($id);
            $re->status = '0';
            $re->save();
            return redirect('/admin/real_estates')->with('succes', 'Inmobiliaria desactivada correctamente');
        } catch (Exception $e) {

            return back()->withErrors(['Error al activar esta inmobiliaria']);
        }
    }

    public function owners()
    {
        $owners = Owner::all();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend/admin/create_admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $this->validate($request, [
                
                'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:8',
            ]);

            $user = new User();

            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->type = "admin";
            $user->active = true;
            $user->save();

            $admin = new Admin();
            $admin->name = $request->name;
            $admin->surname = $request->surname;
            $admin->address = $request->address;
            $admin->phone_1 = $request->phone_1;

            $admin->phone_2 = $request->phone_2;

            $admin->type = $request->type;
            $admin->name = $request->name;
            $admin->user_id = $user->id;
            $admin->save();

           // event(new Registered($user));

            return redirect('/admin/admins')->with('success', 'Administrador creado correctamente');
        } catch (Exception $e) {
            if (config('app.debug')) {
                return redirect()->back()->withInput()->withErrors("No se puede editar este administrador  " . $e->getMessage());
            }
            return redirect()->back()->withInput()->withErrors("Error al crear administrador");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try {
            $admin = Admin::findOrFail($id);
            return view('backend/admin/datos_admin', ['admin' => $admin]);
        } catch (Exception $e) {
            return back()->withErrors(['Error al mostrar el administrador']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {

            Admin::find($id)->update($request->all());
            return redirect('/admin/admins')->with('success', 'Administrador modificado correctamente');
        } catch (Exception $e) {
            if (config('app.debug')) {
                return redirect()->back()->withErrors($e->getMessage());
            }
            return redirect()->back()->withErrors("No se puede editar este administrador");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {

            Admin::find($id)->delete();
            return redirect('/admin/admins')->with('success', 'Administrador borrado correctamente');
        } catch (Exception $e) {
            if (config('app.debug')) {
                return redirect()->back()->withErrors($e->getMessage());
            }
            return redirect()->back()->withErrors("No se puede borrar este administrador");
        }
    }
}
