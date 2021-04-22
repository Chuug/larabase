@extends('layouts.app')

@include('elements.plugins.tinymce')

@section('content')
   <div class="container-fluid col-11 col-sm-10 col-md-8">
      <a href="{{ route('blog.index') }}" class="btn btn-outline-dark">
         <i class="fas fa-chevron-left"></i>
      </a>
      <span class="page-title">Modifier un article</span>
      <div class="row mt-2">
         <div class="col shadow-sm bg-white p-3">
               <form action="{{ route('blog.update', $article->id) }}" method="POST">
                  @csrf
                  @method('patch')
                  <div class="row">
                     <div class="col">
                           <input type="text" name="title" class="form-control mb-2" placeholder="Titre de l'article" value="{{ $article->title }}">
                     </div>
                     <div class="col">
                           <button type="submit" class="btn btn-dark mr-3"><i class="fas fa-save mr-2"></i> Sauvegarder</button>
                           <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteArticle"><i class="fas fa-trash-alt fa-sm mr-1"></i> Supprimer l'article</button>
                     </div>
                     
                  </div>                  
                  <textarea name="article" class="form-control" rows="20" id="tinymce" placeholder="Contenu de l'article">
                     {{ $article->article }}
                  </textarea>
               </form>
         </div>
      </div>
   </div>
   <x-modal :target="$article" targetName="DeleteArticle" type="delete" route="blog.destroy" />
@endsection