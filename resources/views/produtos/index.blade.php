@extends('main') @section('title', '| Lista de Produtos') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card">
                        <div class="card-header"><h2>Listagem de Produtos:
        <a href="{{route('produtos.create')}}" class="btn btn-primary">Cadastrar Produto</a>
    </h2>
    </div>
    <div class="card-body">
    <table id="produtos" class="table table-responsive table-hover">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Categoria</th>
            <th scope="col">Descrição</th>
            <th scope="col">Foto</th>
            <th scope="col">Preço</th>
            <th></th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td scope="col">{{$produto->id}}</td>
                <td>{{$produto->codBarras}}</td>
                <td>{{$produto->nome}}</td>
                <td>@foreach($categorias as $categoria) @if ($categoria->id === $produto->categoria_id) {{$categoria->nome}} @endif @endforeach</td>
                <td>{{$produto->descricao}}</td>
                <td>{{$produto->foto}}</td>
                <td>{{$produto->preco}}</td>
                <td>
                    <a href="{{route('produtos.show',$produto->id)}}">
                        <button type="button" class="btn btn-success">Ver</button>
                    </a>
                </td>
                <td>
                    <a href="{{route('produtos.edit',$produto->id)}}">
                        <button type="button" class="btn btn-warning">Editar</button>
                    </a>
                </td>
                <td>
                    <form style="display: inline;" action="{{route('produtos.destroy', $produto->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="delete">
                        <button class="btn btn-danger">Deletar</button>
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

@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
        $('#produtos').dataTable();
</script>
@endsection