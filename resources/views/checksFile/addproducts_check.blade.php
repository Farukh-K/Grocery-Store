@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Чек</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <form action="{{ url('check/addproducts') }}" method="POST" class="form-horizontal">
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
                        <label for="amount_of_product_in_check" class="col-sm-3 control-label">Количество продукта</label>
                        <div class="col-sm-6">
                          <input type="text" name="amount_of_product_in_check" id="amount_of_product_in_check" class="form-control">
                          @if ($errors->has('amount_of_product_in_check'))
                          <strong>{{$errors->first('amount_of_product_in_check')}}</strong>>
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
                                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($products) > 0)

                    <div class="panel-body">
                      <table class="table table-striped task-table">

                        <!-- Заголовок таблицы -->
                        <thead>
                          <th>Наименование продукта</th>
                          <th>Количество продукта</th>
                          <th>Цена за продукт</th>
                        </thead>
                        <!-- Тело таблицы -->
                        <tbody>
                          @foreach ($products_in_check as $product_in_check)
                            <tr>
                              <td class="table-text">
                                <div>{{ $product_in_check->name_of_product}}</div>
                              </td>
                              <td class="table-text">
                                <div>{{ $product_in_check->amount_of_product_in_check }}</div>
                              </td>
                              <td class="table-text">
                                <div>{{ $product_in_check->price_of_product }}</div>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    @else
                        No Records
                    @endif
  <button class="btn btn-success" type="button" onclick="window.location='{{ url("showcaseproducts/") }}'">
                      <i class="fa fa-plus fa-fw"></i> Подтвердить
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
 <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
@endsection