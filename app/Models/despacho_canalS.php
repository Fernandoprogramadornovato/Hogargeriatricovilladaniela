<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class despacho_canalS extends Model
{
    //
    protected $table='Despacho_canalS';
    protected $fillable= [
        'Despacho_canal_Id',
        'Usuario_Id',
        'Motivo',
        'Fecha'
    ];
    
//relacion uno a muchos con ciudad

 

}