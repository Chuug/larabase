@extends('layouts.app')

@section('content')

@include('elements.blog.article')

   <div class="container-fluid col-11 col-sm-10 col-md-8">

      <div class="row my-3">
         @if (Auth::check())
            <div class="col px-0">
               <h5 class="fw-light">Commenter</h5>
            </div>
            <div class="row">
      
            </div>
            <form action="{{ route('comment.store', ['articleId' => $article->id]) }}" method="POST" class="mt-1 px-0" id="commentForm">
               @csrf
               <textarea name="comment" class="form-control" id="tinymce" rows="3"></textarea>
               <div class="text-end mt-2">
                  <button type="submit" class="btn btn-dark">Envoyer</button>
               </div>
            </form>        
         @endif
      </div>
      
      {{-- Commentaires --}}
      <h4 class="fw-light">{{ count($article->comment) }} commentaire{{ (count($article->comment) > 1)?'s':'' }}</h4>
      <hr class="mb-4">
      @foreach ($article->comment as $comment)
         <div class="row mb-4">
            <div class="col shadow-sm bg-white rounded-sm p-3">
               <div class="row">
                  <div class="col-auto">
                     <img src="/storage/users/avatar/{{ $comment->user->id }}.png" alt="Avatar de {{ $comment->user->name }}" class="avatar-sized rounded-circle shadow-sm">
                  </div>
                  <div class="col ps-0">
                     <span class="d-block fw-bold">{{ $comment->user->name }}</span>
                     <span class="small fw-light">{{ $comment->created }}</span>
                  </div>
                  <div class="col text-end">
                     <div class="drop-menu">
                        <button class="btn btn-sm btn-outline-dark drop-btn">
                           <i class="fas fa-chevron-down drop-btn-icon"></i>
                        </button>
                        <div class="drop-me">
                           <ul class="drop">
                              @can('edit', $comment)
                                 <li><a href="#">Editer</a></li>
                              @endcan
                              @can('destroy', $comment)
                                 <li>
                                    <form action="{{ route('comment.destroy', ['id' => $comment->id]) }}" method="POST">
                                       @csrf
                                       @method('delete')
                                       <button type="submit">Supprimer</button>
                                    </form>
                                 </li>
                              @endcan
                              @if (Auth::user()->id != $comment->user_id)
                                 <li><a href="">Signaler</a></li>
                              @endif     
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <hr>
               <div class="row px-3">
                  {{ $comment->comment }}
               </div>
            </div>
         </div>            
      @endforeach
   </div>
@endsection