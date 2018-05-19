@extends('main')

@section('title', '| Listagem de Clientes')

@section('content')
        <div class="col-md-12">
            <h2>Listagem de Clientes: <a href="/clientes/create" class="btn btn-primary">Cadastrar Cliente</a>
</h2>
            <table id="clientes" class="table table-responsive table-hover">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->id}}</td>
                        <td>{{$cliente->nome}}</td>
                        <td>{{$cliente->telefone}}</td>
                        <td>
                        <a class="btn btn-success" href="/clientes/{{$cliente->id}}">
                        Ver
                        </a>
						<a class="btn btn-primary" href="/clientes/{{$cliente->id}}/edit">
                        Editar
                        </a>

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
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#clientes').DataTable();
        });
    </script>
@endsection