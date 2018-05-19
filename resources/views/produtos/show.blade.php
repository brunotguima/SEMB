@extends('main')
@section('title', '| {{{{$produto[0]->nome}}}}}')
@section('content')


<div class="row">
    <div class="col-md-8">
        
        <table id="produto" class="table table-responsive table-hover">
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
        <tr>
        <td>{{$produto[0]->id}}</td>
        <td>{{$produto[0]->codBarras}}</td>
        <td>{{$produto[0]->nome}}</td>
        <td> </td>
        <td>{{$produto[0]->descricao}}</td>
        <td>{{$produto[0]->foto}}</td>
        <td>{{$produto[0]->preco}}</td>
        </tr> 
        </tbody>
        </table>

        </div>
    </div>



@endsection