@extends('layouts.app', ['activePage' => 'Clientes Institucionales', 'titlePage' => __('Table List')])


<style>



</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


                @if(!$carteraclientes->isEmpty())




                @foreach($carteraclientes as $cartusuario)

                <div class="card ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Cartera Cliente</h4>
                        </div>
                    </div>
                    <div class="card-body ">



                        <div class="row">
                            <label class="col-sm-2 col-form-label">Nit</label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$cartusuario->Nit}}" disabled>
                                    <span class="bmd-help">Nit</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$cartusuario->NCliente}}" disabled>
                                    <span class="bmd-help"></span>
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <label class="col-sm-2 col-form-label">Tipo Dcto</label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="{{$cartusuario->TipoDcto}}" disabled>
                                </div>
                            </div>

                            <label class="col-sm-2 col-form-label">Numero</label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="{{ $cartusuario->NroDcto}}" disabled>
                                </div>
                            </div>
                            
                            <label class="col-sm-2 col-form-label">Fecha</label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="{{ $cartusuario->Fecha}}" disabled>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <label class="col-sm-2 col-form-label">Cupo</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="$ {{number_format($cartusuario->Cupo)}}" disabled>
                                </div>
                            </div>

                            <label class="col-sm-2 col-form-label">Sobre Cupo</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="$ {{ number_format($cartusuario->SobreCupo)}}" disabled>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <label class="col-sm-2 col-form-label">Disponible</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="$ {{ number_format($cartusuario->Disponible)}}" disabled>
                                </div>
                            </div>

                            <label class="col-sm-2 col-form-label">Plazo</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="{{ number_format($cartusuario->Plazo)}} Dias" disabled>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <label class="col-sm-2 col-form-label">Deuda</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="$ {{ number_format($cartusuario->Deuda)}}" disabled>
                                </div>
                            </div>

                            <label class="col-sm-2 col-form-label">Pagado</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="$ {{ number_format($cartusuario->Pagado)}}" disabled>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <label class="col-sm-2 col-form-label">Saldo</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="$ {{ number_format($cartusuario->Saldo)}}" disabled>
                                </div>
                            </div>

                            <label class="col-sm-2 col-form-label">Vencido</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="$ {{ number_format($cartusuario->Vencido)}}" disabled>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Por Vencer</label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="$ {{ number_format($cartusuario->PorVencer)}}" disabled>
                                    <span class="bmd-help">Nit</span>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        @endif

                    </div>
                </div>


                @if($carteraclientes->isEmpty())
                <div class="card ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Cartera Cliente</h4>
                        </div>

                        <center>
                            <h2 class="card-title">El cliente no tiene cartera</h2>
                        </center>
                    </div>



                </div>
                @endif


            </div>
            @section('scripts')
            <script src="https://code.jquery.com/jquery-3.3.1.js"></script>


            <script type="text/javascript">

            </script>
            @endsection

            @endsection