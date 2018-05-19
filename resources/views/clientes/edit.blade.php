@extends('main')

@section('title', '| Editar Cliente')

@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')
<h1>Edição de Clientes</h1>
<hr>    
	<div class="row">
    	<img src="/uploads/{{$cliente->foto}}">
		{!! Form::model($cliente, ['enctype' => 'multipart/form-data', 'route' => ['clientes.update', $cliente->id], 'method' => 'PUT']) !!}
		<div class="col-md-8 col-md-offset-2">
            {{ Form::label('nome', 'Nome:') }}
			{{ Form::text('nome', null, ["class" => 'form-control']) }}
			
			{{ Form::label('telefone', "Telefone:", ['class' => 'form-spacing-top']) }}
			{{ Form::text('telefone', null, ['class' => 'form-control']) }}

			{{ Form::submit('Salvar Modificações', array('class' => 'btn btn-success', 'style' => 'margin-top: 20px;')) }}

		</div>
        @stop
@section('scripts')

	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>

@endsection