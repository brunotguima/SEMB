@extends('main')
@section('title', '| Cadastrar um produto')
@section('content')
{!! Form::open(['route' => 'produtos.store','id' => 'createProdutos']) !!}
{!! Form::token(); !!}
{!! Form::label('nome','Nome:') !!}
{!! Form::text('nome',null,['class' => 'form-control']) !!}
{!! Form::label('codBarras','Código de Barras:') !!}
{!! Form::number('codBarras',null,['class' => 'form-control']) !!}
{!! Form::label('descricao','Descrição:') !!}
{!! Form::text('descricao',null,['class' => 'form-control']) !!}
{!! Form::label('preco','Preço:') !!}
{!! Form::number('preco',null,['class' => 'form-control']) !!}
{!! Form::label('image',null) !!}
{!! Form::file('image',null,['class'=> 'form-control-file']); !!}
{!! Form::submit('Click Me!') !!}
{!! Form::close() !!}
@endsection