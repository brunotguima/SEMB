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
                    <button type="button" id="startWebcam" onclick="BarcodeScan();" data-toggle="modal" data-target="#modalBarcode">Use a Camera!</button>
                    {!! Form::number('codBarras',null,['class' => 'form-control'])!!} {!! Form::label('descricao','Descrição:') !!} {!! Form::text('descricao',null,['class' => 'form-control'])!!} 
                    {!! Form::label('preco','Preço:') !!} 
                    {!! Form::number('preco',null,['class' => 'form-control'])!!} 
                    {!! Form::label('foto',null) !!}
                    <input type="file" name="foto" class="form-control-file" accept="image/*;capture=camera"> 
                    {!! Form::submit('Cadastrar', array('class'=>'form-control btn btn-success', 'style' => 'margin-top:20px')) !!} 
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modalBarcode" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Leitura de Código de Barras:</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="BarcodeKill();">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <canvas></canvas>
            </div>
          </div>
        </div>
      </div>
            @endsection
            @section('scripts')
            {!! Html::script('js/webcodecamjs.js') !!}
            {!! Html::script('js/qrcodelib.js') !!}
            {!! Html::script('js/DecoderWorker.js') !!}
            <script>
                var decoder;
                function BarcodeScan(){       
            var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
            var arg = {
                resultFunction: function(result) {  
                    var codBarras = result.code;
                    document.getElementById("codBarras").value = codBarras;
                    decoder.stop();
                    $('.modal').modal('hide');
        },
            };
            decoder = new WebCodeCamJS("canvas").buildSelectMenu(document.createElement('select'), 0).init(arg).play();
        }
        function BarcodeKill(){
            decoder.stop();
        }
            </script>
            @endsection