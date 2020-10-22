@extends('layouts.empty')

@section('pageTitle', 'Mot de passe oublié')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3 class="text-center mt-5 mb-3">Mot de passe oublié</h3>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6 mx-auto mb-2">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 mx-auto">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Envoyer email') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
