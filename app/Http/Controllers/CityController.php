<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use App\Services\CityService;

/**
 * Class CityController
 *
 * @package App\Http\Controllers
 * @author  David Cigala
 * @version 0.0.1
 * @since   2020-08-17
 */

class CityController extends Controller
{
    /**
     * @var \App\Services\CityService $cityService
     */
    protected CityService $cityService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }

    /**
     * Centralize all ajax calls to the controller in an unique route
     * Later it executes the correspondent method depending on the field which has to come in the HTTP Request
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {

        $action = $request->input('action', null);

        switch ($action) {
            case 'getCountyCities':
                return $this->getCountyCities($request);
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
     * It returns the cities list related to a county
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    private function getCountyCities(Request $request)
    {

        // Respuesta JSON por defecto. Siempre es un error.
        $success  = false;
        $results  = 0;
        $response = array(
            'success' => $success,
            'error'   => array(
                'code'    => 404,
                'message' => 'No se han encontrado provincias que coincidan con los filtros solicitados.'
            )
        );

        $filters = [
            'county_id' => $request->input('item_id', -1),
        ];

        try {
            $data = $this->cityService->index($filters, -1);

            if ($data->isNotEmpty()) {
                $success  = true;
                $results  = count($data);
                $response = $data;
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
