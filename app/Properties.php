<?php

namespace App;

use Faker\Provider\Base;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\BaseModel;
use Illuminate\Support\Facades\DB;


/**
 * App\Properties
 *
 * @property int $id
 * @property int $owner_id
 * @property int $active
 * @property int|null $legal_validator_id
 * @property int|null $commercial_validator_id
 * @property string|null $legal_validated
 * @property string|null $commercial_validated
 * @property string|null $operation_type
 * @property string|null $property_type
 * @property string|null $status
 * @property string|null $url_image
 * @property float $price
 * @property float $agency_commissions
 * @property float $plf_commissions
 * @property float|null $margin_performance
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Conditions $conditions
 * @property-read \App\CountryHome|null                                      $country_home
 * @property-read \App\Flat|null                                             $flat
 * @property-read \App\Home|null                                             $home
 * @property-read \App\Home_types                                            $home_types
 * @property-read \App\Land|null                                             $land
 * @property-read \App\Office|null                                           $office
 * @property-read \App\Owner                                                 $owner
 * @property-read \App\Property_types                                        $property_types
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RealEstate[] $real_estates
 * @property-read int|null                                                   $real_estates_count
 * @property-read \App\Location                                              $zone
 * @method static \Illuminate\Database\Eloquent\Builder|Properties newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Properties newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Properties query()
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereAgencyCommissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereCommercialValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereCommercialValidatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereLegalValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereLegalValidatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereMarginPerformance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereOperationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereOwnersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties wherePlfCommissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties wherePropertyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Properties whereUrlImage($value)
 * @mixin \Eloquent
 */
class Properties extends BaseModel
{
    // Table statuses
    const ACTIVE = 2;  // Example: if(Properties::ACTIVE == $property->status_id) { xxxx
    
    //
    protected $table = 'properties';

    protected $fillable = [
        'ref',
        'owner_id',
        'property_status',
        'legal_validator_id',
        'commercial_validator_id',
        'propertyable_type',
        'propertyable_id',
        'legal_validated',
        'commercial_validated',
        'operation_type',
        'url_image',
        'price',
        'agency_commissions',
        'plf_commissions',
        'margin_performance',
        'description',
        'distance_airport',
        'distance_sea',
        'distance_beach',
        'distance_city',
        'distance_golf',
        'operation',
    ];

    /**
     * Get the description with the HTML accents.
     *
     * @return string
     */
    public function getDescriptionAttribute($value)
    {
        return html_entity_decode($value);
    }

    public function property_types()
    {
        return $this->belongsTo('App\Property_types');
    }
    public function home_types()
    {
        return $this->belongsTo('App\Home_types');
    }
    public function conditions()
    {
        return $this->belongsTo('App\Conditions');
    }


    private function countRealEstateFavsNumber($property_id)
    {
        //numero de inmobiliarias que tienen en favoritos alguna de las propiedades de un owner en particular
        $count_re_favs = DB::table('retail_favorites_properties')
            ->where('retail_favorites_properties.property_id', $property_id)
            ->count();
        return $count_re_favs;
    }

    private function countOpenCards($property_id)
    {
        //numero de aperturas de ficha por mes
        $result =  DB::table('cards')
            ->where('cards.property_id', $property_id)
            ->count();

        return $result;
    }
    /**
     * Get the location records associated with a property.
     *
     * ```
     * Use:
     * $property = App\Properties::find(15);
     * $property->locations
     *
     * Returns:
     *  Illuminate\Database\Eloquent\Collection {#4170
     *    all: [
     *        App\Location {#4171
     *          id: 1,
     *
     * ```
     *
     * ```
     * How to save a location associated to a Property (same for Real Estate):
     *
     * $location = new App\Location()   or  $location=App\Location::find(1);
     * $property->save()  or  $property=App\Property::find(1);
     *
     * $location->property()->save($property)     *
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function location()
    {
        return $this->morphOne('App\Location', 'locationable')->withDefault([
            'country_id' => null,
            'state_id' => null,
            'state_name' => null,
            'county_id' => null,
            'county_name' => null,
            'city_id' => null,
            'city_name' => null,
            'street' => null,
            'postcode' => null,
            'latitude' => config('inmozon.defaultLocation.latitude'),
            'longitude' => config('inmozon,defaultLocation.longitude'),
        ]);
    }


    public function total(){
        $agency_commissions =  ($this->price * $this->agency_commissions*0.01);
        $iva =  $agency_commissions*0.21;
        $calculated_commission =  $this->price - ($agency_commissions + $iva);
       // $this->agency_commissions_number =  number_format($agency_commissions, 2) ;
        //$this->iva =  number_format($iva, 2) ;
        return  number_format($calculated_commission, 2);
    }
    /**
     * Get the images associated with a property.
     *
     * ```
     * Use:
     * $property = App\Properties::find(15);
     * $property->images
     *
     * Returns:
     *  Illuminate\Database\Eloquent\Collection {#4170
     *    all: [
     *        App\Image {#4171
     *          id: 1,
     *          property_id: 15,
     *
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function images()
    {
        return $this->hasMany('App\Image', 'property_id', 'id');
    }

    public function getSortedImages(){
        return $this->images->sortBy('order');
    }

    /**
     * Get the documents associated with a property.
     *
     * ```
     * Use:
     * $property = App\Properties::find(15);
     * $property->documents
     *
     * Returns:
     *  Illuminate\Database\Eloquent\Collection {#4170
     *    all: [
     *        App\Document {#4171
     *          id: 1,
     *          property_id: 15,
     *
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function documents()
    {
        return $this->hasMany('App\Document', 'property_id', 'id');
    }


    //@TODO
    public function owner()
    {
        return $this->belongsTo('App\Owner', 'owner_id');
    }

    public function real_estates()
    {
        return $this->belongsToMany(
            'App\RealEstate',
            'retail_favorites_properties',
            'property_id',
            'real_estate_id'
        );
    }

    public function ficha()
    {
        return $this->belongsToMany(
            'App\RealEstate',
            'cards',
            'property_id',
            'real_estate_id',
        )->withPivot('id', 'created_at');
    }

    public function historical()
    {
        return $this->hasMany('App\HistoricalLine', 'property_id');
    }


    //polimorfismo
    public function propertyable()
    {
        return $this->morphTo();
    }

    public function getType(){
        return substr($this->propertyable_type, 4);
    }

    /*TODO BORRAR, YA NO SE USAN
    public function flat()
    {
        return $this->hasOne('App\Flat', 'property_id');
    }
    public function home()
    {
        return $this->hasOne('App\Home', 'property_id');
    }
    public function country_home()
    {
        return $this->hasOne('App\CountryHome', 'property_id');
    }
    public function office()
    {
        return $this->hasOne('App\Office', 'property_id');
    }
    public function land()
    {
        return $this->hasOne('App\Land', 'property_id');
    }*/
    /////////////////////


    public function sold($admin_id = null)
    {
        $historical = new HistoricalLine();
        $historical->status_id = 7;
        $historical->property_id = $this->id;
        if ($admin_id != null)
            $historical->admin_id = $admin_id;
        $historical->save();
        return $historical;
    }

    public function activate($admin_id = null)
    {
        $historical = new HistoricalLine();
        $historical->status_id = 2;
        $historical->property_id = $this->id;
        if ($admin_id != null)
            $historical->admin_id = $admin_id;

        $historical->save();
        return $historical;
    }

    public function deactivate($reason, $admin_id = null)
    {
        $historical = new HistoricalLine();
        $historical->status_id = 4;
        $historical->property_id = $this->id;
        if ($admin_id != null)
            $historical->admin_id = $admin_id;
        $historical->reason = $reason;
        $historical->save();
        return $historical;
    }

    public function inmozon_check($reason, $admin_id)
    {
        $historical = new HistoricalLine();
        $historical->status_id = 6;
        $historical->property_id = $this->id;
        $historical->admin_id = $admin_id;
        $historical->reason = $reason;
        $historical->save();
        return $historical;
    }

    public function owner_check()
    {
        $historical = new HistoricalLine();
        $historical->status_id = 5;
        $historical->property_id = $this->id;
        $historical->save();
        return $historical;
    }

    public function cancel($reason, $admin_id)
    {
        $historical = new HistoricalLine();
        $historical->status_id = 3;
        $historical->property_id = $this->id;
        $historical->admin_id = $admin_id;
        $historical->reason = $reason;
        $historical->save();
        return $historical;
    }


    protected static function booted()
    {
        //al crear una propiedad creamos tambien un historical_line por defecto con el status sin validar
        static::created(function ($property) {
            $historical_line = new HistoricalLine();
            //se asigna el status 1=sin validar
            $historical_line->status_id = 1;
            $historical_line->property_id = $property->id;
            $historical_line->save();


            /// si el subtipo es una promocion, se debe abrir ficha
            if($property->propertyable_type == 'App\\Promotion'){
                $real_estates_ids = RealEstate::select('id')->get();
                $property->ficha()->attach($real_estates_ids);
            }
            ////////////////////////////////////////
        });
/*
        self::deleting(function($property){
            $property->images->each(function($item, $key){
                $item->delete();
            });
            $property->propertyable->delete();

        });*/
    }

    public function delete(){
        $this->images->each(function($item, $key){
            if($item != null)
                $item->delete();
        });
        
        if($this->propertyable != null)
            $this->propertyable->delete();

        return parent::delete();
    }

    public function isPromotion(){
        if($this->propertyable_type=="App\\Promotion")
            return true;
        else
            return false;
    }

    public function isOffice(){
        if($this->propertyable_type=="App\\Office")
            return true;
        else
            return false;
    }

    public function isFlat(){
        if($this->propertyable_type=="App\\Flat")
            return true;
        else
            return false;
    }
    public function isHome(){
        if($this->propertyable_type=="App\\Home" || $this->propertyable_type=="App\\CountryHome")
            return true;
        else
            return false;
    }

    public function getPrice(){
        return (number_format($this->price , 2, ',', '.').' €');

    }

    public function getCommission(){
        
        if($this->isPromotion())
            return 'Ver detalle';
        else
            return (number_format($this->agency_commissions, 2, ',', '.').'%');
    }
/*
    public function getStreet(){
        if($this->location->country_id!=null && $this->location->street!="" ){
            return $this->location->street;
        }else{
            return "(Sin localización)";
        }
    }*/

    public function getCityName(){
        if($this->location->country_id!=null && $this->location->city!=null && $this->location->city->name!=null){
            return $this->location->city->name;
        }else{
            return "(Sin localización)";
        }
    }

    public function getCountyName(){
        if($this->location->country_id!=null && $this->location->county !=null && $this->location->county->name !=null){
            return $this->location->county->name;
        }else{
            return "(Sin localización)";
        }
    }

    public function getCalculatedCommision(){
        if($this->isPromotion())
            return 'Ver detalle';
        else{

            $this->calculated_commission = $this->price * $this->agency_commissions*0.01;
            if($this->owner->type=='agente' && $this->calculated_commission<2000)
            $this->calculated_commission = 2000;
            elseif($this->owner->type!='agente' && $this->calculated_commission<3000)
            $this->calculated_commission = 3000;
            
            return (number_format($this->calculated_commission , 2, ',', '.').' €');
        }
    }

    public function getPlanos(){
        return $this->documents()->where('url', 'like', '%_planos%')->get();
    }
    public function getMemorias(){
        return $this->documents()->where('url', 'like', '%_memoria%')->get();
    }
    public function getDispo(){
        return $this->documents()->where('url', 'like', '%_dispo%')->get();
    }

    public function getFirstImageOrPlaceholder(){
        $check_image=null;
        if($this->images->first()!=null){

            $path = public_path($this->images->first()->url);
            $check_image = file_exists($path);
            //$check_image = Storage::exists( $property->images()->first()->url);
        }
        if($check_image)
            return $this->images->first()->url;
        else
            return  '/assets/frontend/images/icon/logo_house.jpg';
    }

    public function getImagesOrPlaceholder(){
        $property_images = $this->images;

        foreach($property_images as $property_img){
            $check_image=null;
            if($property_img!=null){

                $path = public_path($property_img->url);
                $check_image = file_exists($path);
                //$check_image = Storage::exists( $property->images()->first()->url);
            }
            if(!$check_image)
                $property_img->url ='/assets/frontend/images/icon/logo_house.jpg';
        } 

        return $property_images;
    }

    public function getCharacteristics(){
        if($this->isFlat() || $this->isHome() ){
            return $this->propertyable->characteristics;
        }elseif($this->isOffice()){
            return 
            $this->propertyable->security.';'
            .$this->propertyable->office_characteristics.';'
            .$this->propertyable->building_characteristics;
        }
    }

    public function hasSwimmingPool(){
        return in_array('piscina', explode(';', $this->getCharacteristics())) ? 'Sí' : 'No';
    }

    public static function translateModelName($key, $languaje = 'es')
    {
        $propertyModelNameDictionary = [[]];
        $propertyModelNameDictionary['es'] =
            [
                "App\Flat" => "Piso",
                "App\CommercialProperty" => "Local commercial",
                "App\CountryHome" => "Casa de campo",
                "App\Home" => "Casa",
                "App\Land" => "Terreno",
                "App\Office" => "Oficina",
                "App\StorageRoom" => "Garaje",
                "App\ParkingSpace" => "Plaza de aparcamiento",
                "App\Promotion" => "Promoción",
            ];
        $propertyModelNameDictionary['en'] =
            [
                "App\Flat" => "Flat",
                "App\CommercialProperty" => "Commercial property",
                "App\CountryHome" => "Country home",
                "App\Home" => "Home",
                "App\Land" => "Land",
                "App\Office" => "Office",
                "App\StorageRoom" => "Garaje",
                "App\ParkingSpace" => "Parking space",
                "App\Promotion" => "Promotion",

            ];

        return $propertyModelNameDictionary[$languaje][$key];
    }
}
