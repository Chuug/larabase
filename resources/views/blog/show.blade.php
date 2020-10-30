@extends('layouts.app')

@section('content')

<div class="container-fluid col-11 col-sm-10 col-md-8">
    <div class="row">
        <div class="col-7">
            <h1 class="page-title">{{ $article->title }}</h1>
        </div>
        <div class="col-5 text-muted text-right mt-4">
            <small>Par <span class="text-body">{{ $article->user->name }}</span> {{ $article->created }}</small>
        </div>
    </div>
    
    <div class="row">
        <div class="col shadow-sm bg-white p-3 rounded-sm">
            {!! $article->article !!}
        </div>
    </div>
    @can('edit', $article)
        <div class="row text-right">
            <div class="col pr-0 mt-2">
                <a href="{{ route('blog.edit', $article->id) }}" class="btn btn-sm btn-dark"><i class="fas fa-sm fa-edit mr-1"></i> Editer</a>
            </div>
        </div>       
    @endcan
</div>
    
@endsection