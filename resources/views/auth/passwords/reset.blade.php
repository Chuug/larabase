@extends('layouts.empty')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center mt-5 mb-3">Mot de passe oublié</h3>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="row">
                    <div class="col-md-6 mx-auto mb-2">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mx-auto mb-2">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Nouveau mot de passe">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 mx-auto mb-2">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer le nouveau mot de passe">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 mx-auto">
                        <button type="submit" class="btn btn-block btn-primary">
                            {{ __('Changer le mot de passe') }}
                        </button>
                    </div>
                </div>
            </form>
    </div>
</div>
@endsection
