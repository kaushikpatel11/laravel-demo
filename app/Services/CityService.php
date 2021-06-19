<?php

namespace App\Services;

use App\Repositories\CityRepository;

/**
 * Class CityService
 *
 * @package App\Services
 * @author  David Cigala
 * @version 0.0.1
 * @since   2020-08-17
 */
class CityService
{
    protected CityRepository $city;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CityRepository $cityRepository)
    {
        $this->city = $cityRepository;
    }

    /**
     * List of cities which follow the filter rules.
     *
     * It is not necessary pass all the filters, only which you need.
     *
     * $filters = array(
     *      'county_id' =>
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
        return $this->city->index($filters, $paginate);
    }

}
