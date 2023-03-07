<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class despacho_canal extends Model
{
    //
    protected $table='Despacho_canal';
    protected $primarykey='Id_despacho_canal';
    protected $fillable= [
        'Id_despacho_canal',
        'despacho_Id',
        'AnimalLlave',
        'AnimalLlaveC',
        'SC1',
        'SC2',
        'CSolicitada',
        'Fechadespacho'

    ];
    
//relacion uno a muchos con ciudad

 

}