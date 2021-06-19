<?php

namespace App\Http\Controllers;

use App\Ficha;
use App\Appointment;
use App\Properties;
use App\RealEstate;
use Illuminate\Http\Request;
use Exception;
use App\Services\MailService;
use DateTime;

class AppointmentController extends Controller
{


    protected MailService $mailService;

    public function __construct(MailService $mailService) {
            $this->mailService  = $mailService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function sendMailToOwner( $appointment_id=null, $card_id){
        //se manda un correo despues de pedir una cita
        try{
            $appointment = Appointment::find($appointment_id);
            $card = Ficha::find($card_id);
            $property_id = $card->property_id;
            $property = Properties::findOrFail($property_id);
            $owner = $property->owner;
            $re_id = $card->real_estate_id;
            $re = RealEstate::find($re_id);

            $date = new DateTime($appointment->date);
            $date = $date->format('d-m-Y H:i');

            //$street = $property->location->street!=null ? ($property->location->street.',') : '';
            //$direccion = 
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
                        'client_name' => $appointment->client_name,
                        'client_nif' => $appointment->client_nif,
                        'street' => $property->location->street,
                        'city' => $property->location->city->name,
                        //'county' => $property->location->county->name,
                        'date' => $date
                        ),

                'to'   => $owner->user->email,
                'cc'   => [],
                'bcc'  => [],


            );

             $dd = $this->mailService->send($mailData);
        }catch(Exception $e){
            return back()->withErrors(['error' . $e->getMessage()]);
        }
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

            $params = $request->all();
            $params['status'] = "Pendiente";
            $appointment = Appointment::create($params);
            $this->sendMailToOwner($appointment->id, $request->card_id);
            return back()->with('success', 'Cita creada correctamente');
        } catch (Exception $e) {
            if (config('app.debug')) {
                return ['success' => false, 'message' => $e->getMessage()];
            }
            return back()->withErrors(['Error al crear la cita']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
}
