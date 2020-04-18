@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Продукты на складе</div>

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
                        </thead>

                        <!-- Тело таблицы -->
                        <tbody>
                          @foreach ($products as $product)
                            <tr>
                              <td class="table-text">
                                <div>{{ $product->name_of_product }}</div>
                              </td>
                              <td class="table-text">
                                <div>{{ $product->amount_of_product }}</div>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    @else
                        No Records
                    @endif
 <button class="btn btn-primary" type="button" onclick="window.location='{{ url("warehouses/add") }}'">
                      <i class="fa fa-plus fa-fw"></i> Добавить партию продукта
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