@extends('main')
@section('title', '| Editar um produto')
@section('content')
{!! Form::model($produto[0], ['enctype' => 'multipart/form-data','route' => ['produtos.update',$produto[0]->id],'method' => 'PUT']) !!}
{!! Form::token(); !!}
{!! Form::label('nome','Nome:') !!}
{!! Form::text('nome',null,['class' => 'form-control']) !!}
{!! Form::label('codBarras','Código de Barras:') !!}
{!! Form::number('codBarras',null,['class' => 'form-control']) !!}
{!! Form::label('descricao','Descrição:') !!}
{!! Form::text('descricao',null,['class' => 'form-control']) !!}
{!! Form::label('preco','Preço:') !!}
{!! Form::number('preco',null,['class' => 'form-control']) !!}
{!! Form::submit('Salvar') !!}
{!! Form::close() !!}
@endsection