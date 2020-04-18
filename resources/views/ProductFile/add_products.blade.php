@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавление нового продукта</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/products" enctype="multipart/form-data" method="POST" class="form-horizontal">
                      {{ csrf_field() }}
                      {{ method_field('POST') }}

                      <div class="form-group">
                        <label for="name_of_product" class="col-sm-3 control-label">Наименование продукта</label>

                        <div class="col-sm-6">
                            <input type="text" name="name_of_product" id="name_of_product" class="form-control">
                        </div>
                        @error('name_of_product')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      <div class=”form-group”>
                        <label for="unit_of_measure" class="col-md-4 control-label" >Единица измерения</label>
                        <div class="col-md-6">
                        <select class="form-control" name="unit_of_measure" id="unit_of_measure">
                        <option value="Килограмм">Килограмм</option>
                        <option value="Штука">Штука</option>
                        <option value="Литр">Литр</option>
                        <option value="Десяток">Десяток</option>
                        </select>
                        </div>
                        </div>
                        @error('unit_of_measure')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        <label for="price_of_the_product" class="col-sm-3 control-label">Цена за единицу измерения</label>

                        <div class="col-sm-6">
                          <input type="text" name="price_of_the_product" id="price_of_the_product" class="form-control">
                        </div>
                         @error('price_of_the_product')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                          <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Сохранить
                          </button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
