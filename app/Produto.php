<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','descricao','codBarras','preco','foto'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'produtos';

    public function vendas()
    {
        return $this->hasMany('App\Venda');
    }

    public function estoque(){
        return $this->belongsTo('App\Estoque');
    }

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

}
