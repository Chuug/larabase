@extends('layouts.adm')

@section('content')
    <h1 class="h2 text-dark font-weight-light m-2 mb-4">Dashboard</h1>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="card text-center">
                        <div class="card-header">
                            <span class="font-weight-normal h5">Utilisateurs</span>
                        </div>
                        <div class="card-body">
                            <span class="h5 font-weight-light">{{ $countUsers }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection