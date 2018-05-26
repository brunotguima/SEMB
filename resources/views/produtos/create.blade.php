@extends('main') 
@section('title', '| Cadastrar um produto')
@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
{!! Html::style('css/select2.min.css') !!}
@endsection 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1>Cadastro de Produtos</h1>
                </div>
                <div class="card-body">
                    {!! Form::open(['enctype' => 'multipart/form-data', 'route' => 'produtos.store','id' => 'createProdutos']) !!} 
                    {!! Form::token();!!} 
                    {!! Form::label('nome','Nome:') !!} 
                    {!! Form::text('nome',null,['class' => 'form-control']) !!}
                    {{ Form::label('categoria', 'Categoria:') }}
                    <select class="form-control select2-multi" name="categoria">
                        @foreach($categorias as $categoria)
                            <option value='{{ $categoria->id }}'>{{ $categoria->nome }}</option>
                        @endforeach
                    </select> 
                    {!! Form::label('codBarras','Código de Barras:') !!} 
                    {!! Form::number('codBarras',null,['class' => 'form-control'])!!} {!! Form::label('descricao','Descrição:') !!} {!! Form::text('descricao',null,['class' => 'form-control'])!!} 
                    {!! Form::label('preco','Preço:') !!} 
                    {!! Form::number('preco',null,['class' => 'form-control','required'])!!} 
                    {!! Form::label('foto',null) !!}
                    <input type="file" name="foto" class="form-control-file"> 
                    {!! Form::submit('Cadastrar', array('class'=>'form-control btn btn-success', 'style' => 'margin-top:20px')) !!} 
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
            @endsection