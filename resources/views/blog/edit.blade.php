@extends('layouts.app')

@include('elements.plugins.trumbowyg')

@section('content')
    <div class="container-fluid col-11 col-sm-10 col-md-8">
        <h1 class="page-title">Modifier un article</h1>
        <div class="row">
            <div class="col shadow-sm bg-white p-3">
                <form action="{{ route('blog.update', $article->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col">
                            <input type="text" name="title" class="form-control mb-2" placeholder="Titre de l'article" value="{{ $article->title }}">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-dark mr-3"><i class="fas fa-save mr-2"></i> Sauvegarder</button>
                            <a href="{{ route('blog.destroy', $article->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt fa-sm mr-1"></i> Supprimer l'article</a>
                        </div>
                        
                    </div>                  
                    <textarea name="article" class="form-control" rows="10" id="trumbowyg" placeholder="Contenu de l'article">
                        {{ $article->article }}
                    </textarea>
                </form>
            </div>
        </div>
    </div>
@endsection