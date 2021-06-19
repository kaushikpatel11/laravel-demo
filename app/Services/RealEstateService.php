<?php

namespace App\Services;

use App\Http\Requests\RealEstateRequest;
use App\Repositories\RealEstateRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class RealEstateService
 *
 * @package App\Services
 * @author  David Cigala
 * @version 0.0.1
 * @since   2020-08-21
 */
class RealEstateService
{
    /**
     * @var \App\Repositories\RealEstateRepository $realEstate
     */
    protected RealEstateRepository $realEstate;

    /**
     * Create a new controller instance.
     * It injects instances inside the controller.
     *
     * @param \App\Repositories\RealEstateRepository $realEstate
     *
     * @return void
     */
    public function __construct(RealEstateRepository $realEstate)
    {
        $this->realEstate = $realEstate;
    }

    /**
     * Return a formated array with a REAL ESTATE. If it exists.
     * It also return its associated data (location and zones).
     * If it does not exist, return an exception.
     *
     * @param integer $id REAL ESTATE ID to search.
     *
     * @return array $data
     * @throws \Throwable
     */
    public function find($id)
    {
        $data           = [];
        $dataRealEstate = $this->realEstate->find($id);

        // Array to associate the model used in the polymorphic relation with its translation to spanish.
        $zoneable_types = [
            'App\Country' => 'Pa&iacute;s',
            'App\State'   => 'Autonom&iacute;a',
            'App\County'  => 'Provincia',
            'App\City'    => 'Ciudad',
        ];

        if (0 < $dataRealEstate->id) {
            // Get the Real Estate
            $data['real_estate'] = $dataRealEstate->toArray();

            // Get the related location and its associated texts/names
            $locations = $dataRealEstate->locations;
            if (!is_null($locations)) {
                $data['locations'] = [];
                foreach ($locations as $key => $location) {
                    $data['locations'][$key]                 = $location->toArray();
                    $data['locations'][$key]['country_name'] = $location->country->name;
                    $data['locations'][$key]['state_name']   = $location->state->name;
                    $data['locations'][$key]['county_name']  = $location->county->name;
                    $data['locations'][$key]['city_name']    = $location->city->name;
                }
            }

            // Get the related zones and its associated texts/names
            $zones = $dataRealEstate->zones;
            if (!is_null($zones)) {
                $data['zones'] = [];
                foreach ($zones as $zone) {
                    $data['zones'][] = [
                        'id'            => $zone->id,
                        'realestate_id' => $zone->realestate_id,
                        'zoneable_id'   => $zone->zoneable_id,
                        'zoneable_type' => substr($zone->zoneable_type, 4), // Remove 'App\' because when we update it is added and we can have 'App\App\City'
                        'text_type'     => html_entity_decode($zoneable_types[$zone->zoneable_type]),  // Spanish accents to HTML
                        'text_name'     => $zone->zoneable->name,
                    ];
                }
            }

            // Get the related ratings
            $ratings = $dataRealEstate->ratings;

            if (!is_null($ratings)) {
                $data['ratings'] = [];
                foreach ($ratings as $rating) {
                    $comment_keys = explode(';', $rating->comment_key);

                    $translations      = DB::table('rating_comments')
                        ->whereIn('key', $comment_keys)
                        ->get('es')
                        ->pluck('es')
                        ->toArray();

                    $translations      = implode('. ', $translations);
                    $data['ratings'][] = [
                        'id'                     => $rating->id,
                        'card_id'                => $rating->card_id,
                        // @ TODO @DCA 2020-08-31 este campo aparentemente solo es necesario para ver los tipos fijos de valoraciones que tiene una inmobiliaria y no se usa en la vista
                        //                        'comment_key'            => $rating->comment_key,
                        'rating'                 => $rating->rating,
                        'open_comment'           => $rating->open_comment,
                        'comment_key_translated' => $translations,
                    ];
                }
            }
        }

        return $data;
    }

    /**
     * Set an array with all the combined data (real estate data, location, work zones)
     * of the record/model RealEstate which ID is $id.
     *
     * @param integer                              $id         ID from the RealEstate.
     * @param \App\Http\Requests\RealEstateRequest $attributes Field list to update.
     *
     * @return array
     */
    private function setRealEstateData($id, RealEstateRequest $attributes)
    {
        $data = [];
        // Set REAL ESTATE fiscal data
        $data['real_estate'] = [
            'user_id'          => Auth::id(),
            'web'    => $attributes->input('web', null),
            'business_name'    => $attributes->input('business_name', null),
            'commercial_name'  => $attributes->input('commercial_name', null),
            'vat_number'       => $attributes->input('vat_number', null),
            'session_title_id' => $attributes->input('session_title_id', null),
            'name'             => $attributes->input('name', null),
            'surname'          => $attributes->input('surname', null),
            'phone_1'          => $attributes->input('phone_1', null),
            'phone_2'          => $attributes->input('phone_2', null),
            'punctuation'      => $attributes->input('punctuation', null),
            'status'           => $attributes->input('status', null),
            'origin'           => $attributes->input('origin', null),
            'language'           => $attributes->input('language', null),
        ];


        // Set REAL ESTATE, address, gps location
        $locations         = $attributes->input('locations', null);
        $data['locations'] = [];
        foreach ($locations['country_id'] as $key => $location) {
            $data['locations'][] = [
                'realestate_id' => (0 < $id) ? $id : null,
                'country_id'    => $locations['country_id'][$key],
                'state_id'      => $locations['state_id'][$key],
                'county_id'     => $locations['county_id'][$key],
                'city_id'       => $locations['city_id'][$key],
                'street'        => $locations['street'][$key],
                'postcode'      => $locations['postcode'][$key],
                'latitude'      => $locations['latitude'][$key],
                'longitude'     => $locations['longitude'][$key],
            ];
        }

        // Set REAL ESTATE, zones
        $zones         = $attributes->input('zones', null);
        $data['zones'] = [];
        if ($zones != null) {
            foreach ($zones['id'] as $key => $zone) {
                $data['zones'][] = [
                    'id'            => $zones['pkey_id'][$key],
                    'realestate_id' => (0 < $id) ? $id : null,
                    'zoneable_id'   => $zone,
                    'zoneable_type' => 'App\\' . $zones['model'][$key],
                ];
            }
        } else {
            $data['zones'][] = [
                //'id'            => $zones['pkey_id'][$key],
                //'realestate_id' => (0 < $id) ? $id : null,
                'zoneable_id'   => 1,
                'zoneable_type' => 'App\\Country',
            ];
        }

        return $data;
    }

    /**
     * Update fields passed by array $attributes
     * of the record/model RealEstate which ID is $id.
     *
     * @param integer                              $id         ID from the Real Estate.
     * @param \App\Http\Requests\RealEstateRequest $attributes Field list to update.
     *
     * @return \App\RealEstate
     * @return \Exception
     * @return \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return \Illuminate\Database\QueryException
     * @throws \Throwable
     */
    public function update($id, RealEstateRequest $attributes)
    {
        try {
            // Set an array with all the combined data (session, music, blocks and timelines)
            $data = $this->setRealEstateData($id, $attributes);
            if($data['real_estate']['status']==null)
                $data['real_estate']['status']='1';
            return $this->realEstate->updateOrCreate($id, $data);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            return $exception;
        } catch (\Illuminate\Database\QueryException $exception) {
            return $exception;
        }
    }


    public function countPropertiesByZones($realEstate)
    {
        //ultimo historico de todas las propiedades
        $last_historical = DB::table('historical_lines')
            ->select(DB::raw('MAX(historical_lines.id) as max_historical_id'), 'historical_lines.property_id as historical_property_id')
            ->groupBy('historical_lines.property_id');

        //ultimo historico de todas las propiedades
        /* $last_historical = DB::table('historical_lines')
        ->select(DB::raw('MAX(historical_lines.id) as max_historical_id'), 'historical_lines.property_id')
        ->groupBy('historical_lines.property_id');*/

        $zones = $realEstate->zones;
        $properties = [];
        foreach ($zones as $zone) {
            //quitamos la zona si es un pais porque sino coje todas las propiedades
            $queryField = substr(strtolower($zone->zoneable_type), 4) . '_id';
            $locations = DB::table('locations')
                ->joinSub($last_historical, 'last_historical', function ($join) {
                    $join->on('last_historical.historical_property_id', '=', 'locations.locationable_id');
                })
                ->join('historical_lines', 'historical_lines.id', '=', 'last_historical.max_historical_id')
                ->where('historical_lines.status_id', '=', 2)
                ->where('locationable_type', 'App\Properties')
                ->where($queryField, $zone->zoneable->id)
                ->where($queryField, $zone->zoneable->id)->pluck('locationable_id')->toArray();
            $properties = array_merge($properties, $locations);
        }
        return (count(array_unique($properties)));
    }

    public function propertiesByZones($realEstate)
    {
        //ultimo historico de todas las propiedades
        $last_historical = DB::table('historical_lines')
            ->select(DB::raw('MAX(historical_lines.id) as max_historical_id'), 'historical_lines.property_id as historical_property_id')
            ->groupBy('historical_lines.property_id');

        //ultimo historico de todas las propiedades
        /* $last_historical = DB::table('historical_lines')
        ->select(DB::raw('MAX(historical_lines.id) as max_historical_id'), 'historical_lines.property_id')
        ->groupBy('historical_lines.property_id');*/

        $zones = $realEstate->zones;
        /*$properties = [];
        foreach ($zones as $zone) {
            //quitamos la zona si es un pais porque sino coje todas las propiedades
            $queryField = substr(strtolower($zone->zoneable_type), 4) . '_id';
            $locations = DB::table('locations')
                ->join('properties', 'properties.id', '=', 'locations.locationable_id')
                ->joinSub($last_historical, 'last_historical', function ($join) {
                    $join->on('last_historical.historical_property_id', '=', 'locations.locationable_id');
                })
                ->join('historical_lines', 'historical_lines.id', '=', 'last_historical.max_historical_id')
                ->where('historical_lines.status_id', '=', 2)
                ->where('locationable_type', 'App\Properties')
                //->where($queryField, $zone->zoneable->id)
                ->where($queryField, $zone->zoneable->id)->get()->toArray();
            $properties = array_merge($properties, $locations);
        }
        //$unique = array_unique($properties);*/
        $properties = collect();
        foreach ($zones as $zone) {
            //quitamos la zona si es un pais porque sino coje todas las propiedades
            $queryField = substr(strtolower($zone->zoneable_type), 4) . '_id';
            $locations = DB::table('locations')
                ->select('*', 'properties.id as id', 'counties.name as county_name', 'cities.name as city_name')
                ->join('counties', 'counties.id', '=', 'locations.county_id')
                ->join('cities', 'cities.id', '=', 'locations.city_id')
                ->join('properties', 'properties.id', '=', 'locations.locationable_id')
                ->joinSub($last_historical, 'last_historical', function ($join) {
                    $join->on('last_historical.historical_property_id', '=', 'locations.locationable_id');
                })
                ->join('historical_lines', 'historical_lines.id', '=', 'last_historical.max_historical_id')
                ->where('historical_lines.status_id', '=', 2)
                ->whereNull('properties.deleted_at')
                ->where('locationable_type', 'App\Properties')
                ->where('locationable_type', 'App\Properties')
                //->where($queryField, $zone->zoneable->id)
                ->where('locations.'.$queryField, $zone->zoneable->id)->get();
            $properties = $properties->merge($locations);
        }
        $properties = $properties->unique('property_id');
        return ($properties);
    }

    /*
    private function countOpenCards(){
        //numero de aperturas de ficha por mes
        $result =  DB::table('cards')
            ->select( DB::raw('count(cards.real_estate_id) as re_number'),  DB::raw('MONTH(cards.created_at) as mo' ))
            ->leftJoin('properties', 'properties.id', '=', 'cards.property_id')
            ->groupBy( DB::raw('MONTH(cards.created_at) '))
            ->get()
            ->toArray();

            //se formatea el aray para que lo entienda la grafica
        $result_formatted = [0,0,0,0,0,0,0,0,0,0];
        $i=0;
            foreach($result as $res){
               $result_formatted[$res->mo] = $res->re_number;
            }

            return $result_formatted;
    }*/

    public function countPropertiesByZonesByMonth($realEstate)
    {
        //ultimo historico de todas las propiedades
        $last_historical = DB::table('historical_lines')
            ->select(DB::raw('MAX(historical_lines.id) as max_historical_id'), 'historical_lines.property_id as historical_property_id')
            ->groupBy('historical_lines.property_id');

        $zones = $realEstate->zones;
        $properties = [];
        foreach ($zones as $zone) {
            //quitamos la zona si es un pais porque sino coje todas las propiedades
            $queryField = substr(strtolower($zone->zoneable_type), 4) . '_id';
            $locations = DB::table('locations')
                ->joinSub($last_historical, 'last_historical', function ($join) {
                    $join->on('last_historical.historical_property_id', '=', 'locations.locationable_id');
                })
                ->join('historical_lines', 'historical_lines.id', '=', 'last_historical.max_historical_id')
                ->where('historical_lines.status_id', '=', 2)
                ->where('locationable_type', 'App\Properties')
                ->where($queryField, $zone->zoneable->id)
                ->get([
                        'locationable_id',
                        DB::raw('MONTH(locations.created_at) as mo'),
                        DB::raw('YEAR(locations.created_at) as year')])
                ->where('year', Carbon::now()->year)
                ->toArray();
            $properties = array_merge($properties, $locations);
        }
        //dd($properties);
        /* $unique_properties = array();
        foreach($properties as $property){
            $unique_properties[$property->locationable_id] = $property->created_at;
        }
*/


        $unique_properties = collect($properties)
            ->unique('locationable_id')
            ->groupBy('mo')
            ->toArray();
        /*
        for($i=0; i<$unique_properties)
*/
        //se formatea el aray para que lo entienda la grafica
        $result_formatted = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $i = 0;
        //se obtiene el numero de propiedades por mes
        foreach ($unique_properties as $key => $res) {
            $result_formatted[$key-1] = count($res);
        }

        return $result_formatted;
    }
}
