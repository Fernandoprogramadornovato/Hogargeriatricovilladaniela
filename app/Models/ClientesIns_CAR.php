<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientesIns_CAR extends Model
{


    protected $table='ClientesIns_CAR';
    protected $fillable= [
        'Corte',
        'Ccosto',
        'NCcosto',
        'Nit',
        'NCliente',
        'TipoDcto',
        'NroDcto',
        'Fecha',
        'Cupo',
        'SobreCupo',
        'Disponible',
        'Plazo',
        'Deuda',
        'Pagado',
        'Saldo',
        'Vencido',
        'PorVencer'
      
    ];


}