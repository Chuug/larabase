@extends('layouts.app')

<!-- Service Injection -->
@inject('Helpers', 'App\Http\Helpers\Helpers')

@section('content')
    <div class="container-fluid col-11 col-sm-10 col-md-8">
        <h1 class="page-title">Mes articles</h1>
        <div class="table-responsive">
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
                            <td><a href="{{ route('blog.edit', $article->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit fa-sm mr-1"></i> Editer</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection