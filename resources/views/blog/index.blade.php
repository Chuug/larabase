@extends('layouts.app')

<!-- Service Injection -->
@inject('Helpers', 'App\Http\Helpers\Helpers')

@section('content')
    <div class="container-fluid col-11 col-sm-10 col-md-8">
        <div class="row">
            <div class="col">
                <h1 class="page-title">Mes articles</h1>
            </div>
            <div class="col text-right">
                <a href="{{ route('blog.create') }}" class="btn btn-dark mt-2"><i class="fas fa-newspaper mr-2"></i> Ajouter un article</a>
            </div>
        </div>
        
        <div class="table-responsive">
            @if ($articles->isNotEmpty())
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th width="60%">Titre</th>
                            <th width="15%">Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr class="align-middle">
                                <td><a href="{{ route('blog.show', $article->id) }}" class="text-dark">{{ $article->title }}</a></td>
                                <td>{{ $Helpers->formatDate($article->updated_at) }}</td>
                                <td class="text-right"><a href="{{ route('blog.edit', $article->id) }}" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="left" title="Editer"><i class="fas fa-edit fa-sm"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>                
            @else
                <p class="font-italic">Vous n'avez pas encore écrit d'articles</p>
            @endif
        </div>
    </div>
@endsection