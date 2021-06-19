<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use App\Services\StateService;

/**
 * Class StateController
 *
 * @package App\Http\Controllers
 * @author  David Cigala
 * @version 0.0.1
 * @since   2020-08-17
 */
class StateController extends Controller
{

    /**
     * @var \App\Services\StateService $stateService
     */
    protected StateService $stateService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StateService $stateService)
    {
        $this->stateService = $stateService;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\State $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\State $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\State $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\State $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
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
            case 'getCountryStates':
                return $this->getCountryStates($request);
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
     * It returns the states list related to a country
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    private function getCountryStates(Request $request)
    {

        // Respuesta JSON por defecto. Siempre es un error.
        $success  = false;
        $results  = 0;
        $response = array(
            'success' => $success,
            'error'   => array(
                'code'    => 404,
                'message' => 'No se han encontrado comunidades autonomas que coincidan con los filtros solicitados.'
            )
        );

        $filters = [
            'country_id' => $request->input('item_id', -1),
        ];

        try {
            $data = $this->stateService->index($filters, -1);

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
