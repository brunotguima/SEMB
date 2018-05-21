@extends('main')
@section('title', '| Venda de Produtos')
@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')
<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header"><h1>Venda de Produtos</h1>
					</div>
					<div class="card-body">				
{!! Form::open(array('enctype' => 'multipart/form-data'	, 'route' => 'vendas.store', 'data-parsley-validate' => '')) !!}
	{{ Form::label('cliente', 'Cliente:') }}
	<select class="form-control select2-multi" name="cliente">
		@foreach($clientes as $cliente)
			<option value='{{ $cliente->id }}'>{{ $cliente->nome }}</option>
		@endforeach
	</select>

	{{ Form::label('produtos', "Produtos:") }}
	<select class="form-control select2-multi" name="produtos[]" multiple="multiple">
		@foreach($produtos as $produto)
			<option value='{{ $produto->id }}'>{{ $produto->nome }}</option>
		@endforeach
	</select>

	{{ Form::label('forma_pgto', "Forma de Pagamento:") }}
	<select class="form-control select2-multi" name="pagamento">
		<option value='cartao'>Cartão</option>
		<option value='a_vista'>À Vista</option>
		<option value='a_prazo'>À Prazo</option>
		<option value='parcelado'>Parcelado</option>
	</select>

	{{ Form::label('pago', "Já Pagou?") }}
	<div class="form-check">
		<label class="form-check-label">
			<input type="radio" class="form-check-input" name="pago" value="1">Sim
		</label>
		</div>
		<div class="form-check">
		<label class="form-check-label">
			<input type="radio" class="form-check-input" name="pago" value="0">Não
		</label>
	</div>


	{{ Form::submit('Vender', array('class' => 'form-control btn btn-success', 'style' => 'margin-top: 20px;')) }}
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection


@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>

@endsection