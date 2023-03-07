<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientesIns extends Model
{
    //

    protected $table='ClientesIns';
    protected $primarykey='Nit';
    protected $fillable= [
        'Nit',
        'nombre',
        'Direccion',
        'Telefono',
        'Telefono1',
        'Celular1',
        'Celular2',
        'Llamar_Lu',
        'Llamar_Ma',
        'Llamar_Mi',
        'Llamar_Ju',
        'Llamar_Vi',
        'Llamar_Sa',
        'Llamar_Do',
        'Hora',
        'FecIngreso',
        'Observacion',
        'Gustos',
        'Mail',
        'ObsSeguimiento',
        'Estado',
        'Usuario',
        'FecRegistro',
        'UsuarioMod',
        'FecRegistroMod',
        'UsuarioEL',
        'FecRegistroEl',
        'UltimoPedido',
        'Cupo',
        'Cartera',
        'Disponible',
        'Vencido'
    ];



}
