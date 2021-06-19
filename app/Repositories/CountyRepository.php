<?php

namespace App\Repositories;

use App\County;

/**
 * Class CountyRepository
 *
 * @package App\Repositories
 * @author  David Cigala
 * @version 0.0.1
 * @since   2020-08-17
 */
class CountyRepository
{

    /**
     * Save an instance of the TainingSession model
     *
     * @var \App\County $county
     */
    protected County $county;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(County $county)
    {
        $this->county = $county;
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
     * @return \App\County
     */
    public function index($filters = [], $paginate = 0)
    {
        $filters = [
            'state_id' => isset($filters['state_id']) ? $filters['state_id'] : -1,
        ];

        $dataQuery = $this->county->query();

        $dataQuery->orderBy('counties.name', 'asc');

        $array_select = ['counties.id', 'counties.name'];

        // Set WHERE conditions with the filters

        if (0 < $filters['state_id']) {
            $dataQuery->where('counties.state_id', $filters['state_id']);
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
