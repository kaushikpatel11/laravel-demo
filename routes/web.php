<?php

use App\Http\Controllers\OwnersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

/*FRONTEND*/

Route::get('/particular', function () {
    return view('frontend/indexParticular');
});
Route::get('/politica-de-privacidad', function () {
    return view('frontend/politica-privacidad');
});
Route::get('/aviso-legal', function () {
    return view('frontend/aviso-legal');
});
Route::get('/politica-de-cookies', function () {
    return view('frontend/politica-cookies');
});
Route::get('/proteccion-de-datos', function () {
    return view('frontend/proteccion-datos');
});
/*BACKEND*/

// Route::filter('real_estate_active', function(){
//     if(Auth::user()->type=='real_estate'
//         && Auth::user()->real_estate!=null
//         && Auth::user()->real_estate->status == "0"){
//             return redirect('logout');
//     }else{
//         return redirect('/');
//     }
// });

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
//buscador
Route::get('terms_and_conditions', function () {
    return view('partials.terms_and_conditions');
});

Route::middleware(['auth'])->group(function () {
    //necesario este middleware de forma general porque hay rutas que son comunes entre distintos roles

    
    Route::middleware(['user_rol'])->group(function () {
        Route::get('/', function () {
        });
        Route::get('/home', function () {
        });
    });

    //ruta para elegir la traduccion
    Route::get('/lang/{locale}', 'LocalizationController@index')->name('lang.set');
    
    Route::get('/info', 'AdminController@info')->name('admin.info.view');
    Route::post('/info', 'AdminController@sendMailToInfo')->name('admin.info.post');
    Route::get('/test', 'OwnersController@test');
    
    //generar pdf y descargar de una propiedad
    Route::get('/properties/{id}/pdf', 'PropertiesController@printPDF')->name('properties.pdf');
    //ver un realestate
    Route::get('/owner/{id}/show', 'OwnersController@showById')->name('owner.show.admin')->middleware('is_admin');
    Route::get('/real_estate/{id}/show', 'RealEstateController@showRealEstate')->name('real_estate.detail');
    Route::get('/real_estates', 'RealEstateController@index');
    //properties
    Route::get('/properties', 'PropertiesController@properties');
    Route::get('/properties/{id}', 'PropertiesController@show')->name('property.show');
    //buscador
    /* Route::get('search_properties/', function () {
         return view('/backend/admin/inmo');
     });*/
    Route::post('search_properties', 'PropertiesController@filterProperties')->name('search_properties');

    //
    Route::get('/properties/{id}/detail', 'PropertiesController@propertyDetail')->name('property.detail');

    //Route::view('/owner/map', 'backend.owners.map')->name('owner.map');
    Route::get('/owner/json/realestates', 'OwnersController@jsonRealEstates')->name('owner.json.realestates');

    Route::get('/real_estate/json/properties', 'RealEstateController@jsonProperties')->name('real_estate.json.properties');


    // Route::view('/admin/real_estate/map', 'backend.realestate.map')->name('real_estate.map');


    Route::middleware(['is_owner'])->group(function () {
        Route::middleware(['owner_exists'])->group(function () {

            Route::view('/owner/map', 'backend.owners.map')->name('owner.map');
            Route::get('/owner', 'OwnersController@show');
            Route::put('/owner', 'OwnersController@updateOwner');
            Route::get('/owner/dashboard', 'OwnersController@dashboard');
            //PROPIEDADES
            Route::resource('/owner/properties', 'PropertiesController');
            // @DCA 2020-08-26 Ruta para subir XML con las propiedades
            Route::post('/owner/properties/xml', 'PropertiesController@uploadXML')->name('owner.uploadxml');
            Route::post('/owner/properties/xmlJob', 'PropertiesController@uploadXMLJob')->name('owner.uploadxmlJob');

            Route::post('/owner/properties/{id}/sold', 'PropertiesController@soldProperty');
            Route::post('/owner/properties/{id}/activate', 'PropertiesController@activateProperty');
            Route::post('/owner/properties/{id}/deactivate', 'PropertiesController@deactivateProperty');

            Route::post('/owner/properties/{id}/ownerCheckProperty', 'PropertiesController@ownerCheckProperty');
            //inmobiliarias
            Route::get('/owner/real_estates', 'OwnersController@real_estate_list')->name('owner.realestates');
            Route::post('/real_estate/{id}/comment', 'RealEstateController@comment')->name('real_estate.comment');

            //citas/appointments
            Route::get('/owner/appointments', 'OwnersController@myAppointments')->name('owner.appointments');
            Route::post('/owner/appointments/{id}/accept', 'OwnersController@acceptAppointment')->name('accept.appointment');
            Route::post('/owner/appointments/{id}/reject', 'OwnersController@rejectAppointment')->name('reject.appointment');
            Route::post('/owner/appointments/{id}/comment', 'OwnersController@commentAppointment')->name('comment.appointment');

            //fichas
            Route::get('/owner/fichas', 'OwnersController@myCards')->name('owner.fichas');

            // Google Maps JSON response with Real Estates
            //Route::view('/owner/map', 'backend.owners.map')->name('owner.map');
            //Route::get('/owner/json/realestates', 'OwnersController@jsonRealEstates')->name('owner.json.realestates');
        });
        Route::post('/owner', 'OwnersController@store');
        Route::get('/owner/create', 'OwnersController@create')->withoutMiddleware(['user_rol']);
    });


    Route::middleware(['is_admin'])->group(function () {

        Route::get('/admin/search_properties/', function () {
            return view('/backend/admin/inmo');
        });
        Route::view('/admin/owner/map', 'backend.owners.map')->name('admin.owner.map');
        Route::view('/admin/real_estate/map', 'backend.realestate.map')->name('real_estate.map');

        Route::get('/admin/admins', 'AdminController@admin_list');
        Route::get('/admin/owners', 'AdminController@owner_list');
        Route::get('/admin/real_estates', 'AdminController@real_estate_list');
        Route::post('/admin/real_estates/{id}/validate', 'AdminController@validate_real_estate');
        Route::post('/admin/real_estates/{id}/deactivate', 'AdminController@deactivate_real_estate');
        Route::post('/admin/real_estates/{id}/to_trial', 'AdminController@to_trial_real_estate');
        Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('/admin/to_validate/', 'AdminController@validateProperties');
        Route::get('/admin/properties/', 'AdminController@properties');
        Route::get('/admin/fichas/', 'AdminController@fichas');
        //todo middleware validador
        Route::get('/admin/properties/', 'AdminController@properties')->name('admin.properties');
        Route::get('/admin/properties/in_process', 'AdminController@propertiesInProcess');
        Route::get('/admin/properties/{id}', 'PropertiesController@show');
        Route::get('/admin/properties/{id}/delete', 'AdminController@deleteProperty')->name('admin.properties.delete');
        //todo middleware gerencia
        //cambiar status de una propiedad
        Route::post('/admin/properties/{id}/inmozonCheckProperty', 'PropertiesController@inmozonCheckProperty');
        Route::post('/admin/properties/{id}/sold', 'PropertiesController@soldProperty');
        Route::post('/admin/properties/{id}/activate', 'PropertiesController@activateProperty');
        Route::post('/admin/properties/{id}/deactivate', 'PropertiesController@deactivateProperty');
        Route::post('/admin/properties/{id}/validate', 'PropertiesController@validateProperty');
        Route::post('/admin/properties/{id}/cancel', 'PropertiesController@cancelProperty');

        ////////        configuracion de la aplicacion     //////////////////////////////
        Route::get('/admin/config', 'ConfigController@edit');
        Route::post('/admin/config', 'ConfigController@update');
        ////////////////    RESOURCE ADMIN      ///////////////
        Route::resource('/admin', 'AdminController');
        Route::get('/admin/fichas/export', 'AdminController@export')->name('export.fichas');
    });


    Route::middleware(['is_real_estate'])->group(function () {
        Route::middleware(['real_estate_exists'])->group(function () {
            Route::middleware(['is_active_real_estate'])->group(function () {
                Route::view('/real_estate/map', 'backend.realestate.map')->name('real_estate.map');
                //buscador
// @DCA 2020-12-11 refactorizar get por view solamente por una vista.
//                Route::get('/real_estate/search_properties/', function () {
//                    return view('/backend/admin/inmo');
//                });
                Route::view('/real_estate/search_properties/', '/backend/admin/inmo');

                Route::get('/real_estate/dashboard', 'RealEstateController@dashboard');
                Route::get('/real_estate', 'RealEstateController@show');
                // @TODO @DCA 2020-08-25 Reestructurar las rutas para real_estate para tener store, update, delete como un Route::resource
                Route::get('/real_estate/{real_estate}/edit/{edit_disabled?}', 'RealEstateController@edit')->name('real_estate.edit');
                //            Route::put('/real_estate', 'RealEstateController@updateRealEstate');
                Route::put('/real_estate/{real_estate}', 'RealEstateController@update')->name('real_estate.update');
                Route::get('/real_estate/properties', 'RealEstateController@properties')->name('real_estate.properties');
                Route::get('/real_estate/properties/{id}', 'RealEstateController@limitedPropertyDetail');
                //fichas
                Route::get('/real_estate/fichas', 'RealEstateController@fichas')->name('ficha.index');
                Route::post('/real_estate/fichas', 'RealEstateController@abrirFicha')->name('ficha.store');
                Route::get('/real_estate/ficha/{id}/edit', 'RealEstateController@ficha')->name('ficha.show');
                //citas/appointment
                Route::post('/real_estate/appointment/', 'AppointmentController@store')->name('appointment.store');
                //favoritos
                Route::post('/real_estate/properties/{id}/fav', 'RealEstateController@addToFav');
                Route::delete('/real_estate/properties/{id}/fav', 'RealEstateController@removeFromFav');
                Route::get('/real_estate/favorites', 'RealEstateController@favorites');
                //lista inmo
                Route::get('/real_estate/real_estates', 'RealEstateController@real_estates');

                // Google Maps JSON response with properties
                // Route::view('/real_estate/map', 'backend.realestate.map')->name('real_estate.map');
                //Route::get('/real_estate/json/properties', 'RealEstateController@jsonProperties')->name('real_estate.json.properties');
            });
        });
        // @TODO @DCA 2020-08-25 Reestructurar las rutas para real_estate para tener store, update, delete como un Route::resource
        Route::post('/real_estate', 'RealEstateController@store')->name('real_estate.store');
        Route::get('/real_estate/create', 'RealEstateController@create');
    });

    //
    // Cities
    // @DCA el orden es importante
    Route::post('/city_ajax', 'CityController@ajax')->name('city.ajax');

    //
    // Counties
    // @DCA el orden es importante
    Route::post('/county_ajax', 'CountyController@ajax')->name('county.ajax');

    //
    // States
    // @DCA el orden es importante
    Route::post('/state_ajax', 'StateController@ajax')->name('state.ajax');

    //
    // Properties
    // @DCA el orden es importante
    Route::post('/property_ajax', 'PropertiesController@ajax')->name('property.ajax');
});
