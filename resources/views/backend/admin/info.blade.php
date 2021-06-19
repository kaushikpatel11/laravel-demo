@extends('template.template')

@section('top_menu')

@endsection

@section('content')

    <div>
        <div>
            <div>
                <div>
                    <!--begin::Card-->
                    <div>
                        <div class="card">
                           
                                <div class="card-header">
                                    <h1>Contacto</h1>
                                </div>

                    
                            <div class="card card-custom card-stretch ">
                                <!--begin::Header-->

                                <!--end::Header-->
                                <!--begin::Form-->
                                <form id="form_contact"  method="post" action="/info">
                                @csrf

                                <!--begin::Body-->
                                    <div class="card-body">


                                            
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <h3 class="font-weight-bold mb-20 mt-15 text-center">Enviar correo</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">
                                                       Asunto
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               type="text" name="subject" 
                                                               placeholder="Asunto" required>
                                                    </div>

                                                </div>


                                                <div class="form-group row justify-content-center">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">
                                                        Texto
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                    <textarea class="form-control" id="exampleTextarea"
                                                        name="info_text" required  placeholder="Texto" rows="4"></textarea>
                                                    </div>
                                                </div>
                                    </div> 
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            <!--end::Body-->
                <div class="card-footer text-center">
                    <div class="card-toolbar">
                       
                            <button type="submit" form="form_contact" class="btn btn-success mr-2">Enviar</button>
                       
                    </div>
                </div>

            </div>
        </div>
        <!--end::Form-->
    </div>





@endsection

@section('js')
   
@endsection
