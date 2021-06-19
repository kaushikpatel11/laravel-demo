<?php

namespace App\Services;

use App\Repositories\StateRepository;

/**
 * Class StateService
 *
 * @package App\Services
 * @author  David Cigala
 * @version 0.0.1
 * @since   2020-08-17
 */
class StateService
{
    protected StateRepository $state;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StateRepository $stateRepository)
    {
        $this->state = $stateRepository;
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
        return $this->state->index($filters, $paginate);
    }

}
