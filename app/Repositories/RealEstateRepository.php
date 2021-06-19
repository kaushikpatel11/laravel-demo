<?php

namespace App\Repositories;

use App\RealEstate;
use App\Location;
use Illuminate\Support\Facades\DB;

/**
 * Class RealEstateRepository
 *
 * @package App\Repositories
 * @author  David Cigala
 * @version 0.0.1
 * @since   2020-08-21
 */
class RealEstateRepository
{
    /**
     * Save an instance of the RealEstate model
     *
     * @var \App\RealEstate $realEstate
     */
    protected $realEstate;

    /**
     * Save an instance of the Location model
     *
     * @var \App\Location $location
     */
//    protected $location;

    /**
     * Create a new controller instance.
     * It injects instances inside the controller.
     *
     * @param \App\RealEstate $realEstate
     *
     * @return void
     */
    public function __construct(RealEstate $realEstate)
//    public function __construct(RealEstate $realEstate, Location $location)
    {
//        $this->location   = $location;
        $this->realEstate = $realEstate;
    }

    /**
     * Return the record/model of a REAL ESTATE. If it exists.
     * If it does not exist, return an exception.
     *
     * @param integer $id REAL ESTATE ID to search.
     *
     * @return \App\RealEstate|\Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function find($id)
    {
        return $this->realEstate->findOrFail($id);
    }


    /**
     * Update fields passed by array $attributes
     * of the record/model RealEstate which ID is $id.
     *
     * @param integer $id   ID from the Real Estate.
     * @param array   $data array with the data to update.
     *
     * @return \App\RealEstate
     * @return \Exception
     * @return \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return \Illuminate\Database\QueryException
     * @throws \Throwable
     */
    public function updateOrCreate($id, array $data)
    {
        try {
            DB::beginTransaction();

            // Save REAL ESTATE
            if (0 < $id) {
                // Update the current Real Estate
                $realEstate = $this->find($id);
                $realEstate->update($data['real_estate']);

                // Save LOCATIONS
                $realEstate->locations()->delete();
                // Save ZONES
                $realEstate->zones()->delete();
            } else {
                // Create a new Real Estate
                $realEstate = $this->realEstate->create($data['real_estate']);
            }

            // Save LOCATION
            if (1 < count($data['locations'])) {
                $realEstate->locations()->createMany($data['locations']);
            } else {
                $realEstate->locations()->create($data['locations'][0]);
            }

            // Save ZONES
            if (1 < count($data['zones'])) {
                $realEstate->zones()->createMany($data['zones']);
            } else {
                $realEstate->zones()->create($data['zones'][0]);
            }

            DB::commit();

            return $realEstate;

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            DB::rollBack();
            return $exception;
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollBack();
            return $exception;
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }


}
