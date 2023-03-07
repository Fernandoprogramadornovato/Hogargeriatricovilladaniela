@extends('layouts.app', ['activePage' => 'acudientes', 'titlePage' => __('Table List')])


<style>



</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.material.min.css">
@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                </button>
            </div>
            <a class="navbar-brand" href="#pablo"></a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title ">Lista de Acudientes</h4>
                        <p class="card-category"> Este es el listado de los acudientes</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive material-datatables">
                            <table id="datatables" class=" table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead class=" text-primary">
                                    <tr>
                                        <th data-priority="1">
                                            Id Acudiente
                                        </th>
                                        <th data-priority="1">
                                            Nombre Acudiente
                                        </th>
                                        <th>
                                            Cedula
                                        </th>
                                        <th>
                                            Paciente
                                        </th>
                                        <th>
                                            Telefono
                                        </th>
                                        <th>
                                            Direccion
                                        </th>
                                        <th data-priority="1">
                                            Opciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($acudientes)>0)
                                    @foreach($acudientes as $listadoacudiente)
                                    <tr>
                                        <td>
                                        {{$listadoacudiente->idAcudiente}}
                                        </td>
                                        <td>
                                        {{$listadoacudiente->Nombreacudiente}}
                                        </td>
                                        <td>
                                        {{$listadoacudiente->Cedula}}
                                        </td>
                                        <td>
                                        {{$listadoacudiente->TelefonoAcud}}
                                        </td>
                                        <td>
                                        {{$listadoacudiente->Direccion}}
                                        </td>
                                        <td>
                                        {{$listadoacudiente->Pacienteid}}
                                        </td>
                                      
                                        <td class="text-right">
                                            <a href="{{ url('infocanaldespacho',['codigo'=>$listado->Id_despacho])}}"
                                                title="Ver canales"
                                                class="btn btn-link btn-info btn-just-icon like">
                                                <i class="material-icons">assignment_ind</i>
                                            </a>
                                            <a href="{{ url('imprimir',['codigodespacho'=>$listado->Id_despacho])}}"
                                                title="Imprimir"
                                                class="btn btn-link btn-info btn-just-icon like">
                                                <i class="material-icons">´print</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.material.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    alert("abrio");


  

});
</script>
@endsection

@endsection