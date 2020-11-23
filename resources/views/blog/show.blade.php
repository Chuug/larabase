@extends('layouts.app')

@section('content')

@include('elements.blog.article')

    <div class="container-fluid col-11 col-sm-10 col-md-8">

        <div class="row mt-3 mb-3">
            @if (Auth::check())
                <div class="col-12">
                    <button class="btn btn-block btn-dark" id="postComment">Poster un commentaire</button>
                </div>
                <form action="{{ route('comment.store', ['articleId' => $article->id]) }}" method="POST" class="mt-3 collapse" id="commentForm">
                    @csrf
                    <textarea name="comment" class="form-control" id="tinymce" rows="3"></textarea>
                    <div class="text-right mt-2">
                        <button type="submit" class="btn btn-dark">Envoyer</button>
                    </div>
                </form>        
            @endif
        </div>
        @foreach ($article->comment as $comment)
            <div class="row mb-4">
                <div class="col-2 p-2">
                    <div class="row">
                        <div class="col-3">
                            <img src="/storage/users/avatar/{{ $comment->user->id }}.png" alt="Avatar de {{ $comment->user->name }}" class="avatar-sized rounded-circle shadow-sm">
                        </div>
                        <div class="col">
                            <p class="fw-bold m-0 ml-2">{{ $comment->user->name }}</p>
                            <p class="m-0"></p>
                        </div>  
                    </div>
                </div>
                <div class="col-10 shadow-sm bg-white p-3 rounded-sm pb-0">
                    <div class="row p-3">
                        {{ $comment->comment }}
                    </div>
                    <div class="row text-right">
                        <span class="small">{{ $comment->created }}</span>
                    </div>
                </div>
            </div>            
        @endforeach

    </div>
@endsection

@push('bottomScripts')
    <script>
        var commentButton = document.getElementById('postComment');
        var commentForm = document.getElementById('commentForm');
        var commentCollapse = new bootstrap.Collapse(commentForm, {
            toggle: false
        });
        var comment = false;
        commentButton.addEventListener('click',function(){
            commentCollapse.toggle();
            comment = !comment;
            if(comment === true){
                commentButton.innerHTML = "Annuler";
            } else {
                commentButton.innerHTML = "Poster un commentaire";
            }
        });
    </script>
@endpush