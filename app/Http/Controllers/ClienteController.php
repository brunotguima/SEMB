<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Venda;
use Illuminate\Http\Request;
use Image;
use Session;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        Image::make($foto)->resize(150,200)->save(public_path('/uploads/'. $filename));
        $cliente->foto = $filename;
        $cliente->telefone = $request->telefone;
        $cliente->save();
        Session::flash('success', "Cliente cadastrado com sucesso!");
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        $compras = Venda::all()->where('cliente_id', $cliente->id)->where('pago', 0);
        return view('clientes.show', compact('cliente', 'compras'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->nome = $request->nome;
        $cliente->telefone = $request->telefone;

        $cliente->save();

        Session::flash('success', 'Cliente atualizado com sucesso');
        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        Session::flash('success', 'Cliente deletado com sucesso!');

        return redirect('/clientes');
    }
}
