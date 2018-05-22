<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }
}
