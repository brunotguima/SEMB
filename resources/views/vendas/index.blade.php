@extends('main')

@section('title', '| Listagem de Vendas')

@section('content')
           <div class="container">
            <h2>Listagem de Vendas: <a href="/vendas/create" class="btn btn-primary">Realizar Venda</a>
            </h2>
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
                        <td>@if($venda->pago == 1)
                            Sim
                            @else
                            Não
                            @endif
                        </td>
                        <td>
                        <a class="btn btn-success" href="/vendas/{{$venda->id}}">
                        Ver
                        </a>
						<a class="btn btn-primary" href="/vendas/{{$venda->id}}/edit">
                        Editar
                        </a>

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
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#vendas').DataTable();
        });
    </script>
@endsection