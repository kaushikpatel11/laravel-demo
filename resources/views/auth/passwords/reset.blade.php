@extends('layouts.app')

@section('content')




<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group row justify-content-center">
        <div class="col-4 text-left">
            <label class="" for="">Correo electrónico</label>
        </div>
        <div class="col-8">
            <input id="email" minlength="8" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-4" style="text-align: left">
            <label for="">Contraseña</label>
        </div>
        <div class="col-8">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
            name="password" required autocomplete="new-password" placeholder="Contraseña" 
            minlength="8"
            onkeyup="checkPasswordLenght()" 
            data-container="body" data-toggle="popover" 
                                   data-trigger="onkeyup"
                                   data-placement="bottom" data-content="8 carácteres mínimo">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


    <div class="form-group row justify-content-center">
        <div class="col-4">
            <label class="text-left" for="">Repetir contraseña</label>
        </div>
        <div class="col-8">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" 
            placeholder="Repetir contraseña" onkeyup="checkPasswordLenght2()"
            data-container="body" data-toggle="popover" 
                                   data-trigger="onkeyup"
                                   data-placement="bottom" data-content="8 carácteres mínimo">
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <div class="col-md-12 ">
            <button type="submit" class="btn btn-primary">
                {{ __('Reset Password') }}
            </button>
        </div>
    </div>
</form>



<script>
    function checkPasswordLenght() {

        var number_of_chars = $("#password").val().length
        if (number_of_chars < 8) {
            $("#password").addClass("border border-danger")
            $("#password").popover({
                content: function(elem) {
                    var message = "8 carácteres mínimo"
                    return message;
                }
            });
        } else {
            $("#password").removeClass("border border-danger")
            $("#password").addClass("border border-success")
        }
    }

    function checkPasswordLenght2() {

        var number_of_chars = $("#password-confirm").val().length
        if (number_of_chars < 8) {
            $("#password-confirm").addClass("border border-danger")
            $("#password-confirm").popover({
                content: function(elem) {
                    var message = "8 carácteres mínimo"
                    return message;
                }
            });
        } else {
            $("#password-confirm").removeClass("border border-danger")
            $("#password-confirm").addClass("border border-success")
        }
    }
</script>

@endsection
