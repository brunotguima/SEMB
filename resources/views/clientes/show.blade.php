@extends('main')

@section('title', '| Ver Cliente')

@section('content')

	<div class="row">
        <img src="/uploads/{{$cliente->foto}}">
		<div class="col-md-8">
			<h1>{{ $cliente->nome }}</h1>			
			<p class="lead">{{ $cliente->telefone }}</p>
			<hr>
			<ul>	
				<li>Pagamentos Pendentes: {{count($compras)}} 
					<ul>
						@foreach($compras as $compra)
							<li>Produto: {{$compra->produto->nome}}</li>
							<li>Dia da Compra: {{$compra->created_at}}</li>
						@endforeach
					</ul>
				</li>
			</ul>
			</div>
		</div>

@endsection