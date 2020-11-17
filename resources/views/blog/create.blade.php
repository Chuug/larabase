@extends('layouts.app')

@include('elements.plugins.tinymce')

@section('content')
    <div class="container-fluid col-12 col-sm-11 col-md-8">
        <h1 class="page-title">Ajout d'un article</h1>
        <div class="row">
            <div class="col bg-white shadow-sm p-3">
                <form action="{{ route('blog.store') }}" method="POST">
                    @csrf
                    <input type="text" name="title" class="form-control mb-2" placeholder="Titre de l'article">
                    <textarea name="article" class="form-control" rows="10" id="tinymce" placeholder="Contenu de l'article"></textarea>
                    <div class="text-right mt-2">
                        <button type="submit" class="btn btn-dark">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection