@extends('main') @section('title', '| Listagem de Vendas') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card">
                        <div class="card-header"><h2>Listagem de Vendas:
        <a href="{{route('vendas.create')}}" class="btn btn-primary">Realizar Venda</a>
    </h2>
</div>
<div class="card-body">
    <table id="vendas" class="table table-responsive table-hover">
        <thead>
            <th>ID</th>
            <th>Produto</th>
            <th>Cliente</th>
            <th>Pago?</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($vendas as $venda)
            <tr>
                <th>{{$venda->id}}</th>
                <td>{{$venda->produto->nome}}</td>
                <td>{{$venda->cliente->nome}}</td>
                <td>@if($venda->pago == 1) Sim @else Não @endif
                </td>
                <td>
                    <a href="{{route('vendas.show',$venda->id)}}">
                        <button type="button" class="btn btn-success">Ver</button>
                    </a>
                </td>
                <td>
                    <a href="{{route('vendas.edit',$venda->id)}}">
                        <button type="button" class="btn btn-warning">Editar</button>
                    </a>
                </td>
                <td>
                    <form style="display: inline;" action="{{route('vendas.destroy', $venda->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="delete">
                        <button class="btn btn-danger">Apagar Para Todo o Sempre!</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
</div>
    </div>
</div>
@endsection @section('scripts') {!! Html::script('js/jquery.dataTables.js') !!}
<script type="text/javascript">
    $(document).ready(function () {
        $('#vendas').DataTable();
    });
</script> @endsection