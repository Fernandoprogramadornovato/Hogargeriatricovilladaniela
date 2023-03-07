@extends('layouts.app', ['activePage' => 'Clientes Institucionales', 'titlePage' => __('Table List')])


<style>



</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


                @foreach($datosusuario as $usuario)

                <div class="card ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Datos Cliente</h4>
                        </div>
                    </div>
                    <div class="card-body ">



                        <div class="row">
                            <label class="col-sm-2 col-form-label">Nit</label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$usuario->Nit}}" disabled>
                                    <span class="bmd-help">Nit</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$usuario->Nombre}}" disabled>
                                    <span class="bmd-help"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Direccion</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$usuario->Direccion}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="{{$usuario->Telefono}} - {{$usuario->Telefono1}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Celular</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="{{$usuario->Celular1}} - {{$usuario->Celular2}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Llamar</label>
                            <div class="col-sm-1">
                                <div class="form-group">

                                    <div class="form-check">

                                        <label class="form-check-label">
                                            <label class="form-label">Lunes</label>
                                            <input class="form-check-input" type="checkbox" value="" 
                                            
                                            @if($usuario->Llamar_Lu)
                                            
                                            checked
                                            
                                            @endif
                                            
                                            
                                             disabled>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="form-check">

                                        <label class="form-check-label">
                                            <label class="form-label">Martes</label>
                                            <input class="form-check-input" type="checkbox" value=""

                                            @if($usuario->Llamar_Ma)
                                            
                                            checked
                                            
                                            @endif
                                            
                                              disabled>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="form-check">

                                        <label class="form-check-label">
                                            <label class="form-label">Miercoles</label>
                                            <input class="form-check-input" type="checkbox" value="" 
                                            
                                            @if($usuario->Llamar_Mi)
                                            
                                            checked
                                            
                                            @endif
                                            
                                            disabled>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="form-check">

                                        <label class="form-check-label" style="margin-left: 5px; !important">
                                            <label class="form-label">Jueves</label>
                                            <input class="form-check-input" type="checkbox" value="" 
                                            
                                            @if($usuario->Llamar_Ju)
                                            
                                            checked
                                            
                                            @endif 
                                            
                                            disabled>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="form-check">

                                        <label class="form-check-label">
                                            <label class="form-label">Viernes</label>
                                            <input class="form-check-input" type="checkbox" value=""
                                            
                                            @if($usuario->Llamar_Vi)
                                            
                                            checked
                                            
                                            @endif
                                             
                                             disabled>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="form-check">

                                        <label class="form-check-label">
                                            <label class="form-label">Sabado</label>
                                            <input class="form-check-input" type="checkbox" value="" 
                                            
                                            @if($usuario->Llamar_Sa)
                                            
                                            checked
                                            
                                            @endif
                                            
                                            disabled>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-1">
                                <div class="form-group">
                                    <div class="form-check">

                                        <label class="form-check-label">
                                            <label class="form-label">Domingo</label>
                                            <input class="form-check-input" type="checkbox" value="" 
                                            
                                            @if($usuario->Llamar_Do)
                                            
                                            checked
                                            
                                            @endif
                                            
                                            disabled>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <label class="col-sm-2 col-form-label">Hora</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$usuario->Hora}}" disabled>
                                </div>
                            </div>

                            <label class="col-sm-2 col-form-label">Fecha Ingreso</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$usuario->FecIngreso}}" disabled>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Observación</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$usuario->Observacion}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <label class="col-sm-2 col-form-label">Gustos</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$usuario->Gustos}}" disabled>
                                </div>
                            </div>

                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$usuario->Mail}}" disabled>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <label class="col-sm-2 col-form-label">Cupo</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="$ {{ number_format($usuario->Cupo)}}" disabled>
                                </div>
                            </div>

                            <label class="col-sm-2 col-form-label">Cartera</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="$ {{ number_format($usuario->Cartera)}}" disabled>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <label class="col-sm-2 col-form-label">Disponible</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="$ {{ number_format($usuario->Disponible)}}" disabled>
                                </div>
                            </div>

                            <label class="col-sm-2 col-form-label">Vencido</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="$ {{ number_format($usuario->Vencido)}}" disabled>
                                </div>
                            </div>

                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
            @section('scripts')
            <script src="https://code.jquery.com/jquery-3.3.1.js"></script>


            <script type="text/javascript">

            </script>
            @endsection

            @endsection