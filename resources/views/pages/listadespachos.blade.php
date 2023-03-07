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


        <!--Modal: modalPush-->
        <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">DESPACHAR CANAL</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <input type="hidden" name="iddeldespacho" id="iddeldespacho" class="form-control"
                        style='display-none;' value="">
                    <div class="modal-body">

                        <center>
                            <h4>Esta seguro que desea enviar el despacho de la canal?</h4>
                        </center>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="cerrarventanaenviardespacho"
                            data-dismiss="modal">Cerrar</button>
                        <button type="button" id="enviardespachocanal" class="btn btn-primary">Enviar
                            despacho</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title ">Lista Despachos canales</h4>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive material-datatables">
                            <table id="datatables" class=" table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead class=" text-primary">
                                    <tr>
                                        <th data-priority="1">
                                            Id
                                        </th>
                                        <th data-priority="1">
                                            Conductor
                                        </th>
                                        <th>
                                            Placa
                                        </th>
                                        <th>
                                            Fecha
                                        </th>
                                        <th data-priority="1">
                                            Opciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($listadodesp as $listado)
                                    <tr>
                                        <td>
                                            {{$listado->Id_despacho}}
                                        </td>
                                        <td>
                                            {{$listado->Descripcion}}
                                        </td>
                                        <td>
                                            {{$listado->Placa}}
                                        </td>
                                        <td>
                                            {{$listado->Fecha}}
                                        </td>

                                        <td>

                                        @if($listado->Estado=='0')
                                            <button type="button" data-id="{{$listado->Id_despacho}}"
                                                class="open-modal btn btn-success" data-toggle="modal"
                                                data-target="#modalPush">Despachar</button>

                                        @endif
                                             

                                            <a href="{{ url('infocanaldespacho',['codigo'=>$listado->Id_despacho])}}"
                                                title="Ver canales" class="btn btn-link btn-info btn-just-icon like">
                                                <i class="material-icons">assignment_ind</i>
                                            </a>
                                            @if($listado->Estado=='1')
                                            <a href="{{ url('imprimir',['codigodespacho'=>$listado->Id_despacho])}}"
                                                title="Imprimir" class="btn btn-link btn-info btn-just-icon like">
                                                <i class="material-icons">´print</i>
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
$(document).on("click", ".open-modal", function() {
    var Codigo = $(this).data('id');
    console.warn(Codigo);

    $('#iddeldespacho').val(Codigo);

});


$(document).ready(function() {



    $('#enviardespachocanal').on("click", function() {


        var _token = $('input[name="_token"]').val();
        var iddespacho =$('#iddeldespacho').val();


        $.ajax({

            type: "GET",
            url: "{{ route('autorizardespacho') }}",
            data: {
                "_token": _token,
                "iddespacho": iddespacho
            },
            success: function(data) {


               alert("Despacho Realizado");
               $('#modalPush').modal('hide');
               
               location.reload();



            }
        });

    });






});
</script>
@endsection

@endsection