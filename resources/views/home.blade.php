@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <button class="btn btn-success" type="button" onclick="window.location='{{ url("products") }}'">
                      <i class="fa fa-plus fa-fw"></i> Продукты
                    </button>
                    <button class="btn btn-success" type="button" onclick="window.location='{{ url("warehouses") }}'">
                      <i class="fa fa-plus fa-fw"></i> Продукты на складе
                    </button>
                     <button class="btn btn-success" type="button" onclick="window.location='{{ url("showcaseproducts") }}'">
                      <i class="fa fa-plus fa-fw"></i> Продукты на витрине
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
