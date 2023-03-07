@extends('layouts.app', ['activePage' => 'Lista despacho', 'titlePage' => __('Table List')])


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

        <button class="btn btn-primary btn-block" style='display:none;' id="botonnotificacion"
                                onclick="md.showNotificationeliminarcanal('top','right')">Top Right</button>



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title ">Detalles de despacho</h4>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive material-datatables">
                            <table id="datatables" class=" table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead class=" text-primary">
                                    <tr>
                                        <th data-priority="1">
                                            Codigo Animal
                                        </th>
                                        <th data-priority="1">
                                            Canal 1
                                        </th>
                                        <th>
                                            Canal 2
                                        </th>
                                        <th>
                                            Solicitud
                                        </th>
                                        <th data-priority="1">
                                            Fecha salida
                                        </th>
                                        <th data-priority="1">
                                            Opciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($listadespachodetalle as $listadetalle)
                                    <tr>
                                        <td>
                                            {{$listadetalle->AnimalLlaveC}}
                                        </td>
                                        <td>
                                            @if($listadetalle->SC1==1)

                                            Salio

                                            @endif

                                        </td>
                                        <td>
                                            @if($listadetalle->SC2==1)

                                            Salio

                                            @endif
                                        </td>
                                        <td>
                                            @if($listadetalle->CSolicitada==1)

                                            Solicitada

                                            @else

                                            Permiso Admin

                                            @endif
                                        </td>
                                        <td>
                                            {{$listadetalle->Fechadespacho}}
                                        </td>




                                        <td class="text-right">
                                            @if($listadetalle->Estado==0)

                                            <button type="button" name="remove"
                                                id="{{$listadetalle->Id_despacho_canal}}"
                                                class="btn btn-danger btn_remove">Quitar</button>

                                            @endif

                                            @if($listadetalle->CSolicitada==0)
                                            <a href="#" title="Detalle solicitud"
                                                class="btn btn-link btn-info btn-just-icon like">
                                                <i class="material-icons">assignment_ind</i>
                                            </a>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@section('script')

<script type="text/javascript">
$(document).ready(function() {


    $('#datatables').on('click', '.btn_remove', function() {

       // $(this).parents('tr').remove();
       var dato=this.id;
       $(this).parents('tr').remove();
       var _token = $('input[name="_token"]').val();

       $.ajax({
                type: "GET",
                url: "{{ route('eliminarcanal') }}",
                data: {
                    "_token": _token,
                    "id_despacho_canal": dato,
                },
                success: function(data) {

                    $("#botonnotificacion").trigger("click");
                  


                }
            });
           

    });




});
</script>
@endsection

@endsection