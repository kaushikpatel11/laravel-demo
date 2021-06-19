<?php

namespace App\Repositories;

use App\City;

/**
 * Class CityRepository
 *
 * @package App\Repositories
 * @author  David Cigala
 * @version 0.0.1
 * @since   2020-08-17
 */
class CityRepository
{

    /**
     * Save an instance of the TainingSession model
     *
     * @var \App\City $city
     */
    protected City $city;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(City $city)
    {
        $this->city = $city;
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
     * @return \App\City
     */
    public function index($filters = [], $paginate = 0)
    {
        $filters = [
            'county_id' => isset($filters['county_id']) ? $filters['county_id'] : -1,
        ];

        $dataQuery = $this->city->query();

        $dataQuery->orderBy('cities.name', 'asc');

        $array_select = ['cities.id', 'cities.name'];

        // Set WHERE conditions with the filters

        if (0 < $filters['county_id']) {
            $dataQuery->where('cities.county_id', $filters['county_id']);
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
