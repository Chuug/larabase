@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="h2 text-dark font-weight-light mb-5">Paramètres utilisateur</h1>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <h5>Information du profil</h5>
            <p>Mettre à jour les informations de votre profil et de votre adresse email.</p>
        </div>
        <div class="col-sm-12 col-md-8 bg-white rounded shadow-sm p-4">
            <form action="{{ route('user.update.profile') }}" method="POST">
            @csrf
            @method("PATCH")
                <div class="col-sm-12 col-md-8">
                    <label for="name" class="mb-2">Pseudo</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : Auth::user()->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
    
                    <label for="email" class="mb-2 mt-4">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? old('email') : Auth::user()->email }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark mt-4 float-right">Sauvegarder</button>
            </form>
        </div>
    </div>
    <hr class="my-5">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <h5>Changer le mot de passe</h5>
            <p>Faites attention à bien utiliser un mot de passe long et difficile à trouver.</p>
        </div>
        <div class="col-sm-12 col-md-8 bg-white rounded shadow-sm p-4">
            <form action="{{ route('user.update.password') }}" method="POST">
            @csrf
            @method("PATCH")
                <div class="col-sm-12 col-md-8">
                    <label for="old_password" class="mb-2">Ancien mot de passe</label>
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password">
                    @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    

                    <label for="new_password" class="mb-2 mt-4">Nouveau mot de passe</label>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    

                    <label for="confirm_password" class="mb-2 mt-4">Confirmer le nouveau mot de passe</label>
                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password">
                    @error('confirm_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
                
                </div>
                <button type="submit" class="btn btn-dark mt-4 float-right">Sauvegarder</button>
            </form>
        </div>
    </div>
    <hr class="my-5">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <h5 id="update-avatar">Mettre l'avatar à jour</h5>
            <p>Privilégiez les images ayant la même largeur et hauteur</p>
            <div class="text-center">
                <img src="/storage/users/avatar/{{ Auth::user()->id }}.png" class="mt-3 avatar-settings avatar-shadow" alt="avatar">
            </div>
            
        </div>
        <div class="col-sm-12 col-md-8 bg-white rounded shadow-sm p-4">
            <form action="{{ route('user.update.avatar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
                <div class="col-sm-12 col-md-8">
                    <label for="avatar" class="mb-2">Choisissez un nouvel avatar</label>
                    <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                    @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                   
                </div>
                <button type="submit" class="btn btn-dark mt-4 float-right">Sauvegarder</button>
            </form>
        </div>
    </div>
</div>
@endsection