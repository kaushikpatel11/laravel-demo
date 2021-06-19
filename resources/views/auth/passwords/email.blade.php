@extends('layouts.app')

@section('content')



    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group row justify-content-center">
            <label style="align-self: center" for="">Correo electrónico</label>

            <div class="col-md-6">
                <input id="email" placeholder="Email" type="email"
                       class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                       required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert" style="background:yellow !important">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12 text-center ">
            <button type="submit" class="btn btn-primary">
                {{ __('Send Password Reset Link') }}
            </button>
            <div class=" pt-5 pr-10 d-flex justify-content-end" style="font-weight: 500">
                <a  href="{{ route('login') }}">{{ __('Login') }}</a>
            </div>

        </div>

    </form>




@endsection
