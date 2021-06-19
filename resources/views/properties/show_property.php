@extends('template.template')

@section('top_menu')
<div class="d-flex align-items-center flex-wrap mr-2">
    <!--begin::Page Title-->
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Crear propiedad</h5>
    <!--end::Page Title-->

</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="flex-row-fluid ml-lg-12">
                <!--begin::Card-->
                <div class="card card-custom card-stretch">
                    <!--begin::Form-->
                    <form method="post" id="form_create_property" action="/owner/properties/create/home">
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="imagenes-tab" data-toggle="tab" href="#imagenes" role="tab" aria-controls="profile" aria-selected="false">Imagenes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="type-tab" style="display: none;" data-toggle="tab" href="#caracteristicas" role="tab" aria-controls="contact" aria-selected="false">Piso</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="char-tab" data-toggle="tab" href="#char" role="tab" aria-controls="contact" aria-selected="false">Characteristics</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <!--propiedades generales-->
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-12 col-xl-12">
                                            <h5 class="font-weight-bold mb-6">Datos generales de la propiedad</h5>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Property type</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control form-control-solid" name="property_type" id="property_type" value="">
                                                <option value="" selected disabled hidden>Select</option>
                                                <option>Flat</option>
                                                <option>Home/Chalet</option>
                                                <option>Country home</option>
                                                <option>Office</option>
                                                <option>Land</option>
                                                <option>Storage room</option>
                                                <option>Comercial Property</option>
                                                <option>Garage</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Price</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text" name="price">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Agency Commision</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text" name="agency_commissions">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Plf Commision</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text" name="plf_commissions" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Community fees</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text" name="community_fees" value="">
                                        </div>
                                    </div>



                                    <div class="form-group mb-1">
                                        <label for="exampleTextarea">Descripcion</label>
                                        <textarea class="form-control" id="exampleTextarea" name="description" rows="3"></textarea>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="checkbox-inline">
                                                <label class="checkbox">
                                                    <input type="checkbox" name="active" value="" />
                                                    <span></span>
                                                    Activa
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--imagenes-->
                                <div class="tab-pane fade" id="imagenes" role="tabpanel" aria-labelledby="imagenes-tab">
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-12 col-xl-12">
                                            <h5 class="font-weight-bold mb-6">Imágenes de la propiedad</h5>
                                        </div>
                                    </div>
                                </div>
                                <!--datos especificos de la propiedad, conditional render con el campo tipo de propiedad de la primera pestaña-->
                                <div class="tab-pane fade" id="caracteristicas" role="tabpanel" aria-labelledby="type-tab">
                                    <div id="caracteristicas_flat" style="display: none;">

                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-12 col-xl-12">
                                                <h5 class="font-weight-bold mb-6">Datos del piso</h5>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Built meters</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="built_meters">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Bathrooms</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="bathrooms">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Bedrooms</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="bedrooms">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Facade</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="facade" id="exampleSelect1" value="">
                                                    <option>Exterior</option>
                                                    <option>Interior</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Floor</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="floor" id="exampleSelect1" value="">
                                                    <option>Bajo</option>
                                                    <option>Intermedio</option>
                                                    <option>Atico</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Type</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="type" id="exampleSelect1" value="">
                                                    <option>Piso</option>
                                                    <option>Ático</option>
                                                    <option>Dúplex</option>
                                                    <option>Estudio/loft</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Estado</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="estate" id="exampleSelect1" value="">
                                                    <option>A reformar</option>
                                                    <option>Buen estado</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="caracteristicas_home" style="display: none;">

                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h5 class="font-weight-bold mb-6">Datos Home/Chalet</h5>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Type</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="type" id="exampleSelect1" value="">
                                                    <option>Casa o chalet independiente</option>
                                                    <option>Chalet pareado</option>
                                                    <option>Chalet adosado</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Estado</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="estate" id="exampleSelect1" value="">
                                                    <option>A reformar</option>
                                                    <option>Buen estado</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Bathrooms</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="bathrooms">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Bedrooms</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="bedrooms">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Built metersss</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="built_meters">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="caracteristicas_country" style="display: none;">

                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h5 class="font-weight-bold mb-6">Datos Country Home</h5>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Type</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="type" id="exampleSelect1" value="">
                                                    <option>Casa o chalet independiente</option>
                                                    <option>Chalet pareado</option>
                                                    <option>Chalet adosado</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Estado</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="estate" id="exampleSelect1" value="">
                                                    <option>A reformar</option>
                                                    <option>Buen estado</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Bathrooms</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="bathrooms">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Bedrooms</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="bedrooms">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Built metersss</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="built_meters">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="caracteristicas_office" style="display: none;">

                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h5 class="font-weight-bold mb-6">Datos Office</h5>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Estado</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="state" id="exampleSelect1" value="">
                                                    <option>A reformar</option>
                                                    <option>Buen estado</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Built meters</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="built_meters">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Nº de plazas de garaje</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="garage" id="exampleSelect1" value="">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option value="5">5+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Facade</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="facade" id="exampleSelect1" value="">
                                                    <option>Exterior</option>
                                                    <option>Interior</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Distribution</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="distribution" id="exampleSelect1" value="">
                                                    <option>Diafana</option>
                                                    <option>Dividida mamparas</option>
                                                    <option>Dividida tabiques</option>
                                                    <option>Por plantas</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Distribution</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="airconditioning" id="exampleSelect1" value="">
                                                    <option>No</option>
                                                    <option>Frio</option>
                                                    <option>Frio y calor</option>
                                                    <option>Preinstalado</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Floors</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="floors">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Uso exclusivo</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="office_exclusive_use" id="exampleSelect1" value="">
                                                    <option>Si</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="caracteristicas_land" style="display: none;">

                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h5 class="font-weight-bold mb-6">Datos Land</h5>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Type</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="type" id="exampleSelect1" value="">
                                                    <option>Urbano</option>
                                                    <option>Urbanizable</option>
                                                    <option>No Urbanizable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Superficie total</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="meters">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Buildable meters</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="buildable_meters">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">Superficie minima que vende</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="minimum_meters">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Maximum buildable floors</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="maximum_buildable_floors" id="exampleSelect1" value="">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option value="5">5+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">Acceso rodado</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" name="acceso_rodado" id="exampleSelect1" value="">
                                                    <option>Si</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>



                                    </div>
                                </div>

                                <!-- caracteristicas checkbox de las propiedades -->
                                <div class="tab-pane fade" id="char" role="tabpanel" aria-labelledby="char-tab">
                                    <form class="form">
                                        <div class="row">
                                            <!--checkbox caractereisticas de una propiedad general-->
                                            <div id="car_property" class="form-group">
                                                <label>Caracteristicas de la propiedad</label>
                                                <div class="row">
                                                    <div class="checkbox-list">
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="elevator" value="elevator">
                                                            <span></span>Elevator</label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="energetic_certification" value="energetic_certification">
                                                            <span></span>Energetic certification</label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" checked="checked" name="armarios" value="armarios">
                                                            <span></span>Armarios empotrados</label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="aire" value="aire">
                                                            <span></span>Aire acondicionado</label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="security" value="security">
                                                            <span></span>Security</label>
                                                    </div>
                                                    <div class="checkbox-list">
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="terraza" value="terraza">
                                                            <span></span>Terraza</label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="balcon" value="balcon">
                                                            <span></span>Balcon</label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="trastero" value="trastero">
                                                            <span></span>Trastero</label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="garaje" value="garaje">
                                                            <span></span>Plaza de garaje</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--checkbox caractereisticas edificio-->
                                            <div id="car_building" class="form-group">
                                                <label>Caracteristicas del edificio</label>
                                                <div class="checkbox-inline">
                                                    <label class="checkbox">
                                                        <input type="checkbox" checked="checked" name="piscina" value="piscina">
                                                        <span></span>Piscina</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="zona_verde" value="zona verde">
                                                        <span></span>Zona verde</label>
                                                </div>
                                            </div>
                                            <!--checkbox caractereisticas oficina-->
                                            <div id="car_ofi" style="display: none;" class="form-group ">
                                                <label>Caracteristicas de la oficina</label>
                                                <div class="checkbox-list">
                                                    <label class="checkbox">
                                                        <input type="checkbox" checked="checked" name="agua_caliente" value="agua_caliente">
                                                        <span></span>Agua caliente</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="calefaccion" value="calefaccion">
                                                        <span></span>Calefacción verde</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="cocina" value="cocina">
                                                        <span></span>Cocina</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="almacen" value="almacen">
                                                        <span></span>Almacen</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="cristal_doble" value="cristal_doble">
                                                        <span></span>Cristal doble</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="falso_techo" value="falso_techo">
                                                        <span></span>Falso techo</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="suelo_tecnico" value="suelo_tecnico">
                                                        <span></span>Suelo técnico verde</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="elevator" value="elevator">
                                                        <span></span>Elevator</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="energetic_certification" value="energetic_certification">
                                                        <span></span>Energetic certification</label>
                                                </div>
                                            </div>
                                            <!--checkbox seguridad oficina oficina-->
                                            <div id="seguridad_ofi" style="display: none;" class="form-group">
                                                <label>Seguridad oficina</label>
                                                <div class="checkbox-list">
                                                    <label class="checkbox">
                                                        <input type="checkbox" checked="checked" name="puerta_seguridad" value="Puerta de seguridad">
                                                        <span></span>Puerta de seguridad</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="alarma" value="Alarma">
                                                        <span></span>Alarma</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="control" value="Control de accesos">
                                                        <span></span>Control de accesos</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="detector_incendios" value="Detectores de incendios">
                                                        <span></span>Detectores de incendios</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="extintores" value="Extintores">
                                                        <span></span>Extintores</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="aspersores" value="Aspersores">
                                                        <span></span>Aspersores</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="cortafuegos" value="Puerta cortafuegos">
                                                        <span></span>Puerta cortafuegos</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="luces" value="Luces de salida">
                                                        <span></span>Luces de salida</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="conserje" value="Conserje/Portero">
                                                        <span></span>Conserje/Portero</label>
                                                </div>
                                            </div>
                                            <!--checkbox caracteristicas terreno-->
                                            <div id="car_land" style="display: none;" class="form-group">
                                                <label>Caracteristicas Terreno</label>
                                                <div class="checkbox-list">
                                                    <label class="checkbox">
                                                        <input type="checkbox" checked="checked" name="agua" value="Agua">
                                                        <span></span>Agua</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="luz" value="Luz">
                                                        <span></span>Luz</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="alcantarillado" value="Alcantarillado">
                                                        <span></span>Alcantarillado</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="gas" value="Gas natural">
                                                        <span></span>Gas natural</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="alumbrado" value="Alumbrado público">
                                                        <span></span>Alumbrado público</label>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="aceras" value="Aceras">
                                                        <span></span>Aceras</label>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                                <!--end::Body-->
                                <div class="card-footer">

                                    <button type="submit" class="btn btn-success mr-2">Validate</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>

                    </form>
                    <!--end::Form-->
                </div>
            </div>


        </div>
    </div>
</div>
</div>
@endsection
@section('js')
<script>
    document.getElementById("property_type").addEventListener('change', (event) => {

        //////adicional para oficina
        document.getElementById("seguridad_ofi").style.display = "none";
        document.getElementById("car_ofi").style.display = "none";
        document.getElementById("car_building").style.display = "block";
        document.getElementById("car_property").style.display = "block";
        document.getElementById("car_land").style.display = "none";
        //////////////

        document.getElementById("type-tab").style.display = "block";
        document.getElementById("caracteristicas_flat").style.display = "none";
        document.getElementById("caracteristicas_home").style.display = "none";
        document.getElementById("caracteristicas_country").style.display = "none";
        document.getElementById("caracteristicas_office").style.display = "none";
        document.getElementById("caracteristicas_land").style.display = "none";

        switch (event.target.value) {
            case "Flat":
                document.getElementById("type-tab").innerText = "Piso";
                document.getElementById("caracteristicas_flat").style.display = "block";
                document.getElementById("form_create_property").action = "/owner/properties/create/flat"
                break;
            case "Home/Chalet":
                document.getElementById("type-tab").innerText = "Casa/Home";
                document.getElementById("caracteristicas_home").style.display = "block";
                document.getElementById("form_create_property").action = "/owner/properties/create/home"
                break;
            case "Country home":
                document.getElementById("type-tab").innerText = "Country";
                document.getElementById("caracteristicas_country").style.display = "block";
                document.getElementById("form_create_property").action = "/owner/properties/create/country_home"
                break;
            case "Office":
                document.getElementById("type-tab").innerText = "Office";
                document.getElementById("caracteristicas_office").style.display = "block";
                document.getElementById("seguridad_ofi").style.display = "block";
                document.getElementById("car_property").style.display = "none";
                document.getElementById("car_ofi").style.display = "block";
                document.getElementById("form_create_property").action = "/owner/properties/create/office"
                break;
            case "Land":
                document.getElementById("type-tab").innerText = "Land";
                document.getElementById("car_land").style.display = "block";
                document.getElementById("car_building").style.display = "none";
                document.getElementById("car_property").style.display = "none";
                document.getElementById("caracteristicas_land").style.display = "block";
                document.getElementById("form_create_property").action = "/owner/properties/create/land"
                break;
            case "Storage room":
                document.getElementById("type-tab").innerText = "Storage room";
                document.getElementById("caracteristicas_home").style.display = "block";
                document.getElementById("type-tab").href = "#caracteristicas_storage";
                document.getElementById("form_create_property").action = "/owner/properties/create/storage"
                break;
            case "Comercial Property":
                document.getElementById("type-tab").innerText = "Comercial";
                document.getElementById("caracteristicas_home").style.display = "block";
                document.getElementById("type-tab").href = "#caracteristicas_comercial";

                document.getElementById("form_create_property").action = "/owner/properties/create/comercial"
                break;
            case "Garage":
                document.getElementById("type-tab").innerText = "Garage";
                document.getElementById("caracteristicas_home").style.display = "block";
                document.getElementById("type-tab").href = "#caracteristicas_garage";

                document.getElementById("form_create_property").action = "/owner/properties/create/garage"
                break;
            default:
                document.getElementById("type-tab").innerText = "Flat";
                document.getElementById("caracteristicas_flat").style.display = "block";
                document.getElementById("type-tab").href = "#caracteristicas_flat";

                document.getElementById("form_create_property").action = "/owner/properties/create/flat"
                break;
        }
    });
</script>
@endsection
