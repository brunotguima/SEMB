<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Image;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return view ('produtos.index',compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->codBarras = $request->codBarras;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        Image::make($foto)->resize(150,200)->save(public_path('/uploads/'. $filename));
        $cliente->foto = $filename;
        $produto->save();
        Session::flash('success', "Produto cadastrado com sucesso!");
        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = DB::table('produtos')->where('id','=',$id)->get();
        return view ('produtos.show',compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = DB::table('produtos')->where('id','=',$id)->get();
        return view ('produtos.edit',compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->nome = $request->nome;
        $produto->codBarras = $request->codBarras;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $produto->save();
        Session::flash('success', "Produto atualizado com sucesso!");
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        Session::flash('success', 'Produto deletado com sucesso!');
        return redirect('/produtos');
    }
}
