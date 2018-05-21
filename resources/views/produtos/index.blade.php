@extends('main')
@section('title', '| Lista de Produtos')
@section('content')
        <div class="col">
            <h2>Listagem de Produtos: <a href="{{route('produtos.create')}}" class="btn btn-primary">Create</a></h2>
            <table id="produtos" class="table table-responsive table-hover">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Preço</th>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                    <tr>
                        <th scope="col">{{$produto->id}}</th>
                        <td>{{$produto->codBarras}}</td>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->categoria_id}}</td>
                        <td>{{$produto->descricao}}</td>
                        <td>{{$produto->foto}}</td>
                        <td>{{$produto->preco}}</td>
                        <td><a href="{{route('produtos.show',$produto->id)}}"><button type="button" class="btn btn-success">Show</button></a></td>
                        <td><a href="{{route('produtos.edit',$produto->id)}}"><button type="button" class="btn btn-warning">Editar</button></a></td>
                        <td><form style="display: inline;" action="{{route('produtos.destroy', $produto->id)}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="delete">
                            <button class="btn btn-danger">Deletar</button>
                       </form></td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
       
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/jquery.dataTables.js') !!}

    <script type="text/javascript">
        $('#produtos').DataTable();
    </script>
@endsection