<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class despacho extends Model
{
    //
    protected $table='Paciente';
    protected $primarykey='idPaciente';
    protected $fillable= [
        'idPaciente',
        'Nombrepaciente',
        'Cedula',
        'Telefono',
        'Direccion',
        'Fechanacimiento',
        'Serviciofunebre',
        'Eps',
    ];
    
//relacion uno a muchos con ciudad

 

}