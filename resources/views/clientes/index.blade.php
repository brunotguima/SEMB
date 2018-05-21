@extends('main') @section('title', '| Listagem de Clientes') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card">
                        <div class="card-header"><h2>Listagem de Clientes:
        <a href="{{route('clientes.create')}}" class="btn btn-primary">Cadastrar Cliente</a>
    </h2></div>
    <div class="card-body">
    <table id="clientes" class="table table-responsive table-hover">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->telefone}}</td>
                <td>
                    <a href="{{route('clientes.show',$cliente->id)}}">
                        <button type="button" class="btn btn-success">Ver</button>
                    </a>
                </td>
                <td>
                    <a href="{{route('clientes.edit',$cliente->id)}}">
                        <button type="button" class="btn btn-warning">Editar</button>
                    </a>
                </td>
                <td>
                    <form style="display: inline;" action="{{route('clientes.destroy', $cliente->id)}}" method="post">
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
        $('#clientes').DataTable();
    });
</script> @endsection