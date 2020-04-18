@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Перемещение партии продукта</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form action="{{ url('showcaseproducts/remove') }}" method="POST" class="form-horizontal">
                      {{ csrf_field() }}
                      {{ method_field('POST') }}
                      <div class="form-group">
                        <label for="product_id" class="col-sm-3 control-label">Наименование продукта</label>

                        <div class="col-sm-6">
                          <select name="product_id" class="form-control">
                            @foreach ($products as $product)
                              <option value="{{ $product->id }}">{{ $product->name_of_product }}</option>
                                @endforeach
                          </select>
                        </div>
                        <label for="amount_of_product_on_showcase" class="col-sm-3 control-label">Количество продукта</label>

                        <div class="col-sm-6">
                          <input type="text" name="amount_of_product_on_showcase" id="amount_of_product_on_showcase" class="form-control">
                          @if ($errors->has('amount_of_product_on_showcase'))
                          <strong>{{$errors->first('amount_of_product_on_showcase')}}</strong>>
                          @endif
                        </div>
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
