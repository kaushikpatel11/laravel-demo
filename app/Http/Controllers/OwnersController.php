<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use App\Owner;
use App\Properties;
use App\RealEstate;
use Exception;
use App\User;
use App\Ficha;
use App\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Services\MailService;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use DateTime;
use Illuminate\Support\Facades\Mail;
use PDF;



class OwnersController extends Controller
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
        // return redirect("/owner/" . User::find(Auth::id())->owner->id);
    }


    private function countRealEstateTotalOpenCards()
    {
        //numero de inmobiliarias que tienen ficha abierta (total)
        $count_re_total_open = DB::table('cards')
            
            ->leftJoin('properties', 'cards.property_id', '=', 'properties.id')
            ->where('properties.owner_id', Auth::user()->owner->id)
            ->distinct('cards.real_estate_id')
            ->count();

        return $count_re_total_open;
    }

    private function countRealEstateFavsNumber()
    {
        //numero de inmobiliarias que tienen en favoritos alguna de las propiedades de un owner en particular
        $count_re_favs = DB::table('properties')
            ->select('retail_favorites_properties.real_estate_id')
            ->join('retail_favorites_properties', 'retail_favorites_properties.property_id', '=', 'properties.id')
            ->where('properties.owner_id', Auth::user()->owner->id)
            ->groupBy('retail_favorites_properties.real_estate_id')->get();
            //->count();

        return $count_re_favs->count();
    }

    private function countOpenCards()
    {
        //numero de aperturas de ficha por mes
        $result =  DB::table('cards')
            ->select(DB::raw('count(cards.real_estate_id) as re_number'),  DB::raw('MONTH(cards.created_at) as mo'))
            ->leftJoin('properties', 'properties.id', '=', 'cards.property_id')
            ->where('properties.owner_id', Auth::user()->owner->id)
            ->groupBy(DB::raw('MONTH(cards.created_at) '))
            ->distinct('cards.real_estate_id')
            ->get()
            ->toArray();

        //se formatea el aray para que lo entienda la grafica
        $result_formatted = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $i = 0;
        foreach ($result as $res) {
            $result_formatted[$res->mo] = $res->re_number;
        }

        return $result_formatted;
    }

    private function countPendingAppointments()
    {
        //numero de citas pendientes de confirmar
        $count_appointments = Auth::user()->owner
            ->appointments()
            ->where('status', 'Pendiente')
            ->where('date', '>', Carbon::now())
            ->count();
        return $count_appointments;
    }
/*
    public function nextAppointments()
    {

        $appointments2 = DB::table('appointments')
            ->select('*', 'appointments.status as status_name')
            ->join('cards', 'cards.id', '=', 'appointments.card_id')
            ->leftJoin('real_estates', 'real_estates.id', '=', 'cards.real_estate_id')
            ->join('properties', 'properties.id', '=', 'cards.property_id')
            ->where('properties.owner_id', Auth::user()->owner->id)
            ->where('properties.owner_id', Auth::user()->owner->id)
            ->orderBy('appointments.date', 'desc')
            ->where('appointments.date', '<', Carbon::today())
            ->limit(3);

        $appointments = DB::table('appointments')
            ->select('*', 'appointments.status as status_name')
            ->join('cards', 'cards.id', '=', 'appointments.card_id')
            ->leftJoin('real_estates', 'real_estates.id', '=', 'cards.real_estate_id')
            ->join('properties', 'properties.id', '=', 'cards.property_id')
            ->where('properties.owner_id', Auth::user()->owner->id)
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
            ->select('*', 'appointments.status as status_name')
            ->join('cards', 'cards.id', '=', 'appointments.card_id')
            ->leftJoin('real_estates', 'real_estates.id', '=', 'cards.real_estate_id')
            ->join('properties', 'properties.id', '=', 'cards.property_id')
            ->where('properties.owner_id', Auth::user()->owner->id)
            ->orderBy('appointments.date', 'asc')
            ->where('appointments.date', '>', Carbon::now())
            ->limit(10)
            ->get()
            ->sortByDesc('date');
            
            

        return $appointments;
    }

    public function dashboard()
    {

        $open_cards = $this->countOpenCards();

        return view(
            'backend.owners.dashboard_owner',
            [
                'open_cards' => $open_cards,
                'count_re_favs' => $this->countRealEstateFavsNumber(),
                'count_re_total_open_cards' => $this->countRealEstateTotalOpenCards(),
                'count_pending_appointments' => $this->countPendingAppointments(),
                'appointments' => $this->nextAppointments(),
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
        //$owner = User::find(Auth::id())->owner;

        return view('backend.owners.create_owner', ['subtype' => Auth::user()->subtype]);
    }


    public function sendMailToOwner($appointment_id = null, $card_id)
    {
        //se manda un correo despues de pedir una cita
        try {
            $appointment = Appointment::find($appointment_id);
            $card = Ficha::find($card_id);
            $property_id = $card->property_id;
            $property = Properties::findOrFail($property_id);
            $owner = $property->owner;
            $re_id = $card->real_estate_id;
            $re = RealEstate::find($re_id);

            $date = new DateTime($appointment->date);
            $date = $date->format('d-m-Y');

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
                'subject'  => 'Inmozon: cita pendiente',
                'view'     => 'emails.emailAppointmentCreated',
                'params'   => array(
                    'owner_name' => $owner->name,
                    'id' => $property->id,
                    're_name' => $re->commercial_name,
                    'street' => $property->location->street,
                    'city' => $property->location->city->name,
                        /*'county' => $property->location->county->name,*/
                    'date' => $date,
                    're_name' => $re->business_name
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
/*
    public function test(){
        
        $appointment = Appointment::findOrFail(1);
        $card = Ficha::find($appointment->card_id);
        $property_id = $card->property_id;
        $property = Properties::findOrFail($property_id);
        $owner = $property->owner;
        $re_id = $card->real_estate_id;
        $re = RealEstate::find($re_id);
        if ($owner->type == 'agente')
            $minimum_commission = 2000;
        else
            $minimum_commission = 3000;

        // share data to view
        // view()->share('employee', $data); 
        $data = [
            'owner_name' => $owner->name,
            'owner_surname' => $owner->surname,
            'date' => $appointment->date,
            'commercial_name' => $re->commercial_name,
            'client_name' => $appointment->client_name,
            'client_dni' => $appointment->client_dni,
            'street' => $property->location->street,
            'city' => $property->location->city->name,
            'county' => $property->location->county->name,
            'price' => $property->price,
            'agency_commissions' => $property->agency_commissions,
            'minimum_commission' => $minimum_commission
        ];


        $pdf = PDF::loadView('emails.emailComment', $data);
        
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }*/

    public function sendMailToOwnerREAppointmentAccomplished($appointment_id = null)
    {
        //se manda un correo despues de pedir una cita
        try {
            $appointment = Appointment::findOrFail($appointment_id);
            $card = Ficha::find($appointment->card_id);
            $property_id = $card->property_id;
            $property = Properties::findOrFail($property_id);
            $owner = $property->owner;
            $re_id = $card->real_estate_id;
            $re = RealEstate::find($re_id);
            if ($owner->type == 'agente')
                $minimum_commission = 2000;
            else
                $minimum_commission = 3000;

            $commission = $property->agency_commissions*$property->price*0.01;


            

            // share data to view
            // view()->share('employee', $data); 
            $date = new DateTime($appointment->date);
            $date = $date->format('d-m-Y');
            $data = [
                'owner_name' => $owner->name,
                'owner_surname' => $owner->surname,
                'date' => $date,
                'commercial_name' => $re->commercial_name,
                'client_name' => $appointment->client_name,
                'client_dni' => $appointment->client_nif,
                'street' => $property->location->street,
                'city' => $property->location->city->name,
                'county' => $property->location->county->name,
                'state' => $property->location->state->name,
                'postal_code' => $property->location->postcode,
                'price' => number_format($property->price, 2, ',', '.'),
                'agency_commissions' => number_format($property->agency_commissions, 2, ',', '.'),
                'minimum_commission' => number_format($minimum_commission, 2, ',', '.'),
                'commission' => number_format($commission, 2, ',', '.'),
                'nif' => $owner->vat_number
            ];

            //almacenar idioma de la aplicacion
            $previousLocale = app()->getLocale();
            //cambiar al idioma de la inmobiliaria para mandar el email
            app()->setLocale($owner->language);
            $pdfIdiomaOwner = PDF::loadView('emails.emailComment', $data);
            
            Mail::send('emails.emailTest', $data, function ($mail ) use ($pdfIdiomaOwner, $owner) {
                $mail->from('web@inmozon.com', 'Inmozon');
                $mail->subject('Inmozon: Documento registro de cita');
                $mail->to($owner->user->email);
                $mail->attachData($pdfIdiomaOwner->output(), 'documento_registro_cliente.pdf');
            });

            app()->setLocale($re->language);
            $pdfIdiomaRE = PDF::loadView('emails.emailComment', $data);
            
            Mail::send('emails.emailTest', $data, function ($mail ) use ($pdfIdiomaRE, $re) {
                $mail->from('web@inmozon.com', 'Inmozon');
                $mail->subject('Inmozon: Documento registro de cita');

                $mail->to($re->user->email);
                $mail->attachData($pdfIdiomaRE->output(), 'documento_registro_cliente.pdf');
            });

            app()->setLocale($previousLocale);

        } catch (Exception $e) {
            return back()->withErrors(['error' . $e->getMessage()]);
        }
    }

    

    public function sendMailToREAppointmentAccepted($appointment_id = null)
    {
        //se manda un correo despues de pedir una cita
        try {
            $appointment = Appointment::findOrFail($appointment_id);
            $card = Ficha::find($appointment->card_id);
            $property_id = $card->property_id;
            $property = Properties::findOrFail($property_id);
            $owner = $property->owner;
            $re_id = $card->real_estate_id;
            $re = RealEstate::find($re_id);

            //almacenar idioma de la aplicacion
            $previousLocale = app()->getLocale();
            //cambiar al idioma de la inmobiliaria para mandar el email
            app()->setLocale($re->language);

            if ($owner->type == 'agente')
                $minimum_commission = 2000;
            else
                $minimum_commission = 3000;

                $date = new DateTime($appointment->date);
                $date = $date->format('d-m-Y H:i');

            //todo translate
            if($property->isPromotion()){
                $property_promotion = 'promoción';
            }else{
                $property_promotion = 'propiedad';
            }

            $mailData = array(
                'from' => array(
                    'name'    => 'Inmozon',
                    //password: @inmozon.inmo
                    'address' => 'web@inmozon.com'
                ),
                'subject'  => 'Inmozon: cita aceptada',
                'view'     => 'emails.emailAppointmentAccepted',
                'params'   => array(
                    'owner_name' => $owner->name,
                    'owner_surname' => $owner->surname,
                    'ref' => $property->ref,
                    're_name' => $re->name,
                    'price' => number_format($property->price, 0, ',', '.'),
                    'agency_commissions' => number_format($property->agency_commissions, 0, ',', '.'),
                    'minimum_commission' => number_format($minimum_commission, 0, ',', '.'),
                    'street' => $property->location->street,
                    /*'city' => $property->location->city->name,
                        'county' => $property->location->county->name,*/
                    'appointment_date' => $date,
                    'client_name' => $appointment->client_name,
                    'client_nif' => $appointment->client_nif,
                        'property_promotion' => $property_promotion,


                ),

                'to'   => $re->user->email,
                'cc'   => [],
                'bcc'  => [],
            );

            $dd = $this->mailService->send($mailData);

            //volver al idioma de la aplicacion
            app()->setLocale($previousLocale);

        } catch (Exception $e) {
            return back()->withErrors(['error' . $e->getMessage()]);
        }
    }

    public function sendMailToOwnerAppointmentAccepted($appointment_id = null)
    {
        //se manda un correo despues de pedir una cita
        try {
            $appointment = Appointment::findOrFail($appointment_id);
            $card = Ficha::find($appointment->card_id);
            $property_id = $card->property_id;
            $property = Properties::findOrFail($property_id);
            $owner = $property->owner;
            $re_id = $card->real_estate_id;
            $re = RealEstate::find($re_id);
            if ($owner->type == 'agente')
                $minimum_commission = 2000;
            else
                $minimum_commission = 3000;

                $date = new DateTime($appointment->date);
                $date = $date->format('d-m-Y H:i');

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
                'subject'  => 'Inmozon: cita aceptada',
                'view'     => 'emails.emailAppointmentAcceptedToOwner',
                'params'   => array(
                    'owner_name' => $owner->name,
                    'owner_surname' => $owner->surname,
                    'ref' => $property->ref,
                    're_name' => $re->name,
                    're_commercial_name' => $re->commercial_name,
                    'price' => number_format($property->price, 0, ',', '.'),
                    'agency_commissions' => $property->agency_commissions,
                    'minimum_commission' => number_format($minimum_commission, 0, ',', '.'),
                    'street' => $property->location->street,
                    /*'city' => $property->location->city->name,
                        'county' => $property->location->county->name,*/
                    'appointment_date' => $date,
                    'client_name' => $appointment->client_name,
                    'client_nif' => $appointment->client_nif,
                ),

                'to'   => $owner->user->email,
                'cc'   => [],
                'bcc'  => [],
            );
            //set locale
            $dd = $this->mailService->send($mailData);
            app()->setLocale($previousLocale);
        } catch (Exception $e) {
            return back()->withErrors(['error' . $e->getMessage()]);
        }
    }

    public function sendMailToREAppointmentRejected($appointment_id = null)
    {
        //se manda un correo despues de pedir una cita
        try {
            $appointment = Appointment::findOrFail($appointment_id);
            $card = Ficha::find($appointment->card_id);
            $property_id = $card->property_id;
            $property = Properties::findOrFail($property_id);
            $owner = $property->owner;
            $re_id = $card->real_estate_id;
            $re = RealEstate::find($re_id);
            if ($owner->type == 'agente')
                $minimum_commission = 2000;
            else
                $minimum_commission = 3000;

                $date = new DateTime($appointment->date);
                $date = $date->format('d-m-Y H:i');


            //almacenar idioma de la aplicacion
            $previousLocale = app()->getLocale();
            //cambiar al idioma de la inmobiliaria para mandar el email
            app()->setLocale($re->language);

            $mailData = array(
                'from' => array(
                    'name'    => 'Inmozon',
                    //password: @inmozon.inmo
                    'address' => 'web@inmozon.com'
                ),
                'subject'  => 'Inmozon: cita rechazada',
                'view'     => 'emails.emailAppointmentRejected',
                'params'   => array(
                    're_name' => $re->name,
                    'owner_name' => $owner->name,
                    'owner_surname' => $owner->surname,
                    'appointment_date' => $date,
                    'client_name' => $appointment->client_name,
                    'client_nif' => $appointment->client_nif,
                    'id' => $property->id,
                    'ref' => $property->ref,
                    'street' => $property->location->street,
                    'price' => $property->price,
                    'reason' => $appointment->reason
                ),

                'to'   => $re->user->email,
                'cc'   => [],
                'bcc'  => [],
            );

            $dd = $this->mailService->send($mailData);
            app()->setLocale($previousLocale);

        } catch (Exception $e) {
            return back()->withErrors(['error' . $e->getMessage()]);
        }
    }


    public function acceptAppointment($id)
    {
        try {
            $appointment = Appointment::findOrFail($id);
            $appointment->status = "Aceptada";
            $appointment->save();
            $this->sendMailToREAppointmentAccepted($id);
            $this->sendMailToOwnerAppointmentAccepted($id);
            return redirect()->route('owner.appointments')->with('success', 'Cita acceptada correctamente');
        } catch (Exception $e) {
            return back()->withErrors(['Error al aceptar la cita' . $e->getMessage()]);
        }
    }

    public function rejectAppointment($id, Request $request)
    {
        try {

            $appointment = Appointment::findOrFail($id);
            $appointment->status = "Rechazada";
            $appointment->reason = $request->reason;
            $appointment->save();
            $this->sendMailToREAppointmentRejected($appointment->id);
            return redirect()->route('owner.appointments')->with('success', 'Cita rechazada correctamente');
        } catch (Exception $e) {
            return back()->withErrors(['Error al rechazar la cita' . $e->getMessage()]);
        }
    }

    public function commentAppointment($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $appointment = Appointment::findOrFail($id);
            //si entro como propietario
            //y este propietario tiene ficha abierta con alguna de sus propiedades en esta inmobiliaria
            //$ficha = Auth::user()->owner->fichas->where('real_estate_id', '=', $id)->first();
            if (Auth::user()->type == "owner") {
                //dd($request);
                $rating = Rating::create(
                    [
                        'card_id'      => $appointment->card_id,
                        'appointment_id'    => $id,
                        'comment_key'  => implode(';', $request->param),
                        'rating'       => $request->rating,
                        'open_comment' => $request->open_comment,
                    ]
                );

                if($request->appointment_made == "appointment_made"){
                    $appointment->accomplished = true;

                }else{
                    $appointment->accomplished = false;
                }

                $appointment->status = 'Valorada';
                $appointment->save();
                DB::commit();
                //si se ha realizado la cita enviamos correo con el documento de registro de cliente
                if($request->appointment_made == "appointment_made"){
                    $this->sendMailToOwnerREAppointmentAccomplished($appointment->id);   
                }
                return redirect()->to('/owner/appointments')->with('success', 'Cita valorada correctamente');
            } else {
                DB::rollBack();
                return back()->withErrors(['Error debes ser un propietario para comentar una cita']);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors(['Error al comentar la cita' . $e->getMessage()]);
        }
    }



    public function myAppointments()
    {
        try {

            $owner_id = Auth::user()->owner->id;
            $appointments = DB::table('appointments')
                ->select(
                    'appointments.id',
                    'appointments.card_id',
                    'appointments.status',
                    'appointments.client_name',
                    'appointments.client_nif',
                    'appointments.date',
                    'appointments.created_at',
                    'appointments.reason',
                    'real_estates.business_name',
                    'real_estates.commercial_name',
                    'cards.real_estate_id'
                )
                ->join('cards', 'cards.id', '=', 'appointments.card_id')
                ->join('properties', 'properties.id', '=', 'cards.property_id')
                ->leftJoin('real_estates', 'real_estates.id', '=', 'cards.real_estate_id')
                ->where('properties.owner_id', '=', $owner_id)
                ->orderByDesc('appointments.updated_at')
                ->get();
            $comments = DB::table('rating_comments')->select(['id', 'key', 'es'])->get();
            foreach ($appointments as $appointment) {
                $rating = RealEstate::find($appointment->real_estate_id)->averageRating();
                $appointment->re_avgRating = number_format($rating, 2, ',', '.');
            }
            return view(
                'backend.owners.appointments',
                ['appointments' => $appointments],
                ['comments' => $comments]
            );
        } catch (Exception $e) {
            return back()->withErrors(['Error al mostrar citas' . $e->getMessage()]);
        }
    }

    public function myCards()
    {
        try {

            $owner_id = Auth::user()->owner->id;
            $cards = DB::table('cards')
                ->select(
                    'cards.*',
                    'real_estates.*',
                    'properties.*',
                )
                ->join('real_estates', 'cards.real_estate_id', '=', 'real_estates.id')
                ->join('properties', 'properties.id', '=', 'cards.property_id')
                ->where('properties.owner_id', '=', $owner_id)
                ->orderByDesc('cards.updated_at')
                ->get();
            return view('backend.owners.cards', ['cards' => $cards]);
        } catch (Exception $e) {
            return back()->withErrors(['Error al mostrar fichas' . $e->getMessage()]);
        }
    }



    public function real_estate_list()
    {

        //$real_estates = RealEstate::paginate(15);
        $average_rating = DB::table('real_estates')
            ->select('real_estates.id as re_id', DB::raw('AVG(rating) as avg_rating'), DB::raw('COUNT(rating) as rating_count'))
            ->leftJoin('cards', 'cards.real_estate_id', '=', 'real_estates.id')
            ->leftJoin('ratings', 'cards.id', '=', 'ratings.card_id')
            ->groupBy('real_estates.id');

        $real_estates = DB::table('real_estates')
            ->joinSub($average_rating, 'avg_rating', function ($join) {
                $join->on('avg_rating.re_id', '=', 'real_estates.id');
            })
            //->leftJoin('locations', 'locations.locationable_id', '=', 'real_estates.id')
            ->leftJoin('users', 'users.id', '=', 'real_estates.user_id')
            ->where('real_estates.status', '2')
            // ->where('locations.locationable_type', 'App\RealEstate')
            ->orderByDesc('real_estates.updated_at')
            ->get();

        foreach ($real_estates as $real_estate) {
            $real_estate->avg_rating = number_format($real_estate->avg_rating, 1);
            $real_estate->street = RealEstate::find($real_estate->re_id)->locations->first()->street;
            $real_estate->city = RealEstate::find($real_estate->re_id)->locations->first()->city->name;
            $real_estate->county = RealEstate::find($real_estate->re_id)->locations->first()->county->name;
        }


        return view('backend/realestate/realestate_list', ['real_estates' => $real_estates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            /* $request->validate([
                'name' => 'required',
                'vat_number' => 'required',
                'phone_1' => 'required'
            ]);*/
            
            $owner = new Owner();
            $owner->name = $request->name;
            $owner->surname = $request->surname;
            $owner->vat_number = $request->vat_number;
            $owner->phone_1 = $request->phone_1;
            $owner->address = $request->address;
            $owner->language = $request->language;
            /*if ($request->type == null)
                $request->type = "particular";*/
            $owner->type = Auth::user()->subtype;
            $owner->phone_2 = $request->phone_2;
            
            if($request->has('phones'))
                $owner->phones = $request->phones;
            if($request->has('open'))
                $owner->open = $request->open;
            if($request->has('close'))
                $owner->close = $request->close;
            if($request->has('remarks'))
                $owner->remarks = $request->remarks;

            $owner->user_id =  Auth::id();
            $owner->save();
            //if error, redirect with error
            return redirect('/owner/dashboard')->with('success', 'Propietario creado correctamente');
        } catch (Exception $e) {
            if (config('app.debug')) {
                return back()->withInput()->withErrors(['Error al crear el usuario'.$e->getMessage()]) ;
            }
            return back()->withInput()->withErrors(['Error al crear el usuario']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::find(Auth::id());
        $owner = User::find(Auth::id())->owner;

        return view('backend.owners.datos_owner', ['owner' => $owner, 'user' => $user, 'edit_active' => true]);
    }

    public function showById($id)
    {

        $owner = Owner::find($id);
        $user = $owner->user;

        $properties = $owner->properties;

        return view('backend.owners.datos_owner', ['owner' => $owner, 'user' => $user, 'edit_active' => false, 'properties' => $properties]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }

    public function updateOwner(Request $request)
    {
        //
        //
        $request->validate([
            'name' => 'required',
            'vat_number' => 'required',
            'phone_1' => 'required'
        ]);
        //
        $owner = Auth::user()->owner;
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->vat_number = $request->vat_number;
        $owner->phone_1 = $request->phone_1;
        $owner->address = $request->address;
        $owner->language = $request->language;
        //dd($)
        // $owner->type = $request->type;
        $owner->phone_2 = $request->phone_2;
        if($request->has('phones'))
            $owner->phones = $request->phones;
        if($request->has('open'))
            $owner->open = $request->open;
        if($request->has('close'))
            $owner->close = $request->close;
        if($request->has('remarks'))
            $owner->remarks = $request->remarks;
        $user = User::find($owner->user_id);
        $user->email = $request->email;
        //trans
        $user->save();
        $owner->save();
        //if error, redirect with error
        return redirect('/owner/dashboard')->with('success', 'Propietario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Google Maps
     * Send a JSON response with all the real estates
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonRealEstates()
    {
        $realEstates = RealEstate::where('status', '=', "2")->get();
        $data        = [];
        foreach ($realEstates as $realEstate) {
            $locations = $realEstate->locations;
            if (!is_null($locations) && !empty($locations)) {
                foreach ($locations as $location) {
                    $data[] = [
                        'type'       => 'realestate',
                        'id'         => $realEstate->id,
                        'url'        => route('real_estate.detail', ['id' => $realEstate->id]),
                        'attributes' => [
                            'name'         => $realEstate->commercial_name,
                            'phone_1'      => $realEstate->phone_1,
                            'phone_2'      => $realEstate->phone_1,
                            'punctuation'  => $realEstate->punctuation,
                            'street'       => $location->street,
                            'postcode'     => $location->postcode,
                            'city_name'    => $location->city->name,
                            'county_name'  => $location->county->name,
                            'state_name'   => $location->state->name,
                            'country_name' => $location->country->name,
                        ],
                        'geometry'   => [
                            'latitude'  => $location->latitude,
                            'longitude' => $location->longitude,
                        ],
                    ];
                }
            } else {
                $data[] = [
                    'type'       => 'realestate',
                    'id'         => $realEstate->id,
                    'url'        => route('real_estate.detail', ['id' => $realEstate->id]),
                    'attributes' => [
                        'name'         => $realEstate->business_name,
                        'phone_1'      => $realEstate->phone_1,
                        'phone_2'      => $realEstate->phone_1,
                        'punctuation'  => $realEstate->punctuation,
                        'street'       => null,
                        'postcode'     => null,
                        'city_name'    => null,
                        'county_name'  => null,
                        'state_name'   => null,
                        'country_name' => null,
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
