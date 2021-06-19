<?php

namespace App\Services;

use App\Repositories\CountyRepository;

/**
 * Class CountyService
 *
 * @package App\Services
 * @author  David Cigala
 * @version 0.0.1
 * @since   2020-08-17
 */
class CountyService
{
    protected CountyRepository $county;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CountyRepository $countyRepository)
    {
        $this->county = $countyRepository;
    }

    /**
     * List of counties which follow the filter rules.
     *
     * It is not necessary pass all the filters, only which you need.
     *
     * $filters = array(
     *      'state_id' =>
     * );
     *
     * @param array   $filters  array with the filters
     * @param integer $paginate number of records per page.
     *
     * @return \Illuminate\Pagination\Paginator
     * @return \App\State
     */
    public function index($filters = [], $paginate = 0)
    {
        return $this->county->index($filters, $paginate);
    }

}
