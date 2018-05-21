@extends('main')

@section('title', '| Cadastro de Clientes')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
<h1>Cadastro de Clientes</h1>
<hr>
{!! Form::open(array('enctype' => 'multipart/form-data'	, 'route' => 'clientes.store', 'data-parsley-validate' => '')) !!}
	{{ Form::label('nome', 'Nome:') }}
	{{ Form::text('nome', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

	{{ Form::label('foto', 'Foto:') }}
	<input type="file" name="foto" class="form-control-file" required="required">

	{{ Form::label('telefone', "Telefone:") }}
	{{ Form::text('telefone', null, array('class' => 'form-control', 'required' => '')) }}

	{{ Form::submit('Cadastrar Cliente', array('class' => 'form-control btn btn-success', 'style' => 'margin-top: 20px;')) }}
{!! Form::close() !!}
@endsection


@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>

@endsection