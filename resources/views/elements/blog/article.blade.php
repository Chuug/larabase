<div class="container-fluid col-11 col-sm-10 col-md-8">
    <div class="row">
        <div class="col-7">
            <a href="{{ route('blog.show',$article->id) }}" class="text-decoration-none"><h1 class="page-title">{{ $article->title }}</h1></a>
        </div>
        <div class="col-5 text-muted text-end mt-4 pe-0">
            <small>Par <span class="text-body">{{ $article->user->name }}</span>, le {{ $article->created }}</small>
        </div>
    </div>
    
    <div class="row">
        <div class="col shadow-sm bg-white p-3 rounded-sm">
            {!! $article->article !!}
        </div>
    </div>
    <div class="row text-end">
        <div class="col pr-0 mt-2 px-0">
        <a href="{{ route('blog.show',$article->id) }}" class="text-muted me-2 text-muted fst-italic"><u>{{ count($article->comment) }} commentaire{{ (count($article->comment) > 1)?'s':'' }}</u></a>
            @can('edit', $article)
                <a href="{{ route('blog.edit', $article->id) }}" class="btn btn-sm btn-dark"><i class="fas fa-sm fa-edit me-1"></i> Editer</a>
            @endcan
        </div>
    </div>       
</div>