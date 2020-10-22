@extends('layouts.empty')

@section('pageTitle', 'Inscription')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center mb-3 mt-5">Inscription</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row">
                    <div class="col-md-6 mx-auto mb-2">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Pseudo">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mx-auto mb-2">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mx-auto mb-2">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de passe">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mx-auto mb-2">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer le mot de passe">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 mx-auto">
                        <button type="submit" class="btn btn-block btn-primary">
                            {{ __("S'inscrire") }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
