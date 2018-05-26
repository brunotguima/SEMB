@extends('main')
@section('title', '| Cadastro de Categorias')
@section('content')
<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header"><h1>Cadastro de Categorias</h1></div>
					<div class="card-body">
	{!! Form::open(array('enctype' => 'multipart/form-data'	, 'route' => 'categorias.store', 'data-parsley-validate' => '')) !!}
	{{ Form::label('nome', 'Nome:') }}
	{{ Form::text('nome', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

	{{ Form::submit('Cadastrar Categoria', array('class' => 'form-control btn btn-success', 'style' => 'margin-top: 20px;')) }}
	{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection