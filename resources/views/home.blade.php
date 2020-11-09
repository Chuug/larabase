@extends('layouts.app')

@section('content')
<div class="bg-light">
    @foreach ($articles as $article)
        @include('elements.blog.article')
    @endforeach
</div>
@endsection
