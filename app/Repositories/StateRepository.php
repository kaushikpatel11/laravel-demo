<?php

namespace App\Repositories;

use App\State;

/**
 * Class StateRepository
 *
 * @package App\Repositories
 * @author  David Cigala
 * @version 0.0.1
 * @since   2020-08-17
 */
class StateRepository
{

    /**
     * Save an instance of the TainingSession model
     *
     * @var \App\State $state
     */
    protected State $state;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(State $state)
    {
        $this->state = $state;
    }

    /**
     * List of states which follow the filter rules.
     *
     * It is not necessary pass all the filters, only which you need.
     *
     * $filters = array(
     *      'country_id' =>
     * );
     *
     * @param array   $filters  array with the filters
     * @param integer $paginate number of records per page..
     *
     * @return \Illuminate\Pagination\Paginator
     * @return \App\State
     */
    public function index($filters = [], $paginate = 0)
    {
        $filters = [
            'country_id' => isset($filters['country_id']) ? $filters['country_id'] : -1,
        ];

        $dataQuery = $this->state->query();

        $dataQuery->orderBy('states.name', 'asc');

        $array_select = ['states.id', 'states.name'];

        // Set WHERE conditions with the filters

        if (0 < $filters['country_id']) {
            $dataQuery->where('states.country_id', $filters['country_id']);
        }

        // Set up pagination
        // Execute the query and get records
        if (0 < $paginate) {
            $dataQuery = $dataQuery->select($array_select)->paginate($paginate);
            $dataQuery->appends($_GET);
        } else {
            $dataQuery = $dataQuery->select($array_select)->get();
        }

        return $dataQuery;
    }
}
