@extends('main') @section('title', '| Listagem de Categorias') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card">
                        <div class="card-header"><h2>Listagem de Categorias:
        <a href="{{route('categorias.create')}}" class="btn btn-primary">Cadastrar Categoria</a>
    </h2></div>
    <div class="card-body">
    <table id="categorias" class="table table-responsive table-hover">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->nome}}</td>
                <td>
                    <form style="display: inline;" action="{{route('categorias.destroy', $categoria->id)}}" method="post">
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
@endsection @section('scripts') {!! Html::script('js/jquery.dataTables.js') !!}
<script type="text/javascript">
    $(document).ready(function () {
        $('#categorias').DataTable();
    });
</script> @endsection