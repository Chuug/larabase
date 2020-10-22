@extends('layouts.adm')

@section('content')
    <div class="m-4">
        <h1 class="h2 text-dark">Dashboard</h1>
        <div class="row mt-3">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <div class="card">
                    <div class="card-header">
                        <span class="font-weight-normal h5">Utilisateurs</span>
                    </div>
                    <div class="card-body">
                        <span class="h3 font-weight-light">{{ $countUsers }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection