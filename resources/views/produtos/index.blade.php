@extends('main')
@section('title', '| Lista de Produtos')
@section('content')
<a href="{{route('produtos.create')}}">Create</a>

        <div class="col-md-12">
            <h2>Listagem de Produtos:</h2>
            <table id="produtos" class="table table-responsive table-hover">
                <thead>
                    <th>Id</th>
                    <th>Codigo de Barras</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>foto</th>
                    <th>preco</th>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
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