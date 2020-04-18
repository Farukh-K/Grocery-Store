@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Продукты</div>

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
                          <th>Единица измерения продукта</th>
                          <th>Цена за единицу измерения</th>
                        </thead>

                        <!-- Тело таблицы -->
                        <tbody>
                          @foreach ($products as $product)
                            <tr>
                              <td class="table-text">
                                <div>{{ $product->name_of_product }}</div>
                              </td>
                              <td class="table-text">
                                <div>{{ $product->unit_of_measure }}</div>
                              </td>
                              <td class="table-text">
                                <div>{{ $product->price_of_the_product }}</div>

                                   <td class="table-text">
                                <div>
                                  <form action="{{ url('products/delete/'.$product->id) }}" method="POST" class="delete">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger btn-sm" value="DELETE">
                                      <i class="fa fa-trash-o fa-fw"></i> Удалить
                                    </button>
                                  </form>

                                </div>

                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    @else
                        No Records
                    @endif
 <button class="btn btn-primary" type="button" onclick="window.location='{{ url("products/create") }}'">
                      <i class="fa fa-plus fa-fw"></i> Добавить новый продукт
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    $(".delete").on("submit", function(){
        return confirm("Are you sure?");
    });
</script>