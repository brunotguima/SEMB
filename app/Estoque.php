<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $fillable = ['quantidade'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'estoques';

    public function produtos(){
        return $this->hasMany('App\Produto');
    }
}
