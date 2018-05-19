@extends('main')

@section('title', '| Ver Cliente')

@section('content')

	<div class="row">
        <img src="/uploads/{{$cliente->foto}}">
		<div class="col-md-8">
			<h1>{{ $cliente->nome }}</h1>			
			<p class="lead">{{ $cliente->telefone }}</p>
			<hr>
			</div>
		</div>

@endsection