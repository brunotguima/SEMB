@extends('main')

@section('title', '| Cadastrar um produto')

@section('content')
<h1>Cadastro de Produtos</h1>
<hr>
{!! Form::open(['enctype' => 'multipart/form-data', 'route' => 'produtos.store','id' => 'createProdutos']) !!}
    {!! Form::token(); !!}

    {!! Form::label('nome','Nome:') !!}
    {!! Form::text('nome',null,['class' => 'form-control']) !!}

    {!! Form::label('codBarras','Código de Barras:') !!}
    {!! Form::number('codBarras',null,['class' => 'form-control']) !!}

    {!! Form::label('descricao','Descrição:') !!}
    {!! Form::text('descricao',null,['class' => 'form-control']) !!}

    {!! Form::label('preco','Preço:') !!}
    {!! Form::number('preco',null,['class' => 'form-control']) !!}

    {!! Form::label('foto',null) !!}
    <input type="file" name="foto" class="form-control-file" required="required">

    {!! Form::submit('Click Me!', array('class'=>'form-control btn btn-success', 'style' => 'margin-top: 20px')) !!}

{!! Form::close() !!}
@endsection