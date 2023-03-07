@extends('layouts.app', ['activePage' => 'QR', 'titlePage' => __('Table List')])


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
            {{ csrf_field() }}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title ">Despacho Canales</h4>
                        <center>
                            <button type="button" id="camarafrontal" class="btn btn-success">
                                Camara Frontal
                            </button>
                            <button type="button" id="camaratrasera" class="btn btn-success">
                                Camara Trasera
                            </button>
                        </center>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>



                    <div class="row" style="padding-left: 15px;">


                        <div class="col-md-4 offset-md-1">
                            <center>
                                <p class="card-category"> Nombre conductor:</p>
                            </center>
                            <span class="input-group-text">
                                <i class="material-icons">local_shipping</i>

                                <select class="selectpicker" data-live-search="true" data-width="auto"
                                    name="_seleccioneconductor" id="seleccioneconductor"
                                    data-style="btn btn-primary btn-round">
                                    <option data-tokens="Conductores" value="" disabled selected>Conductor</option>
                                    <option value="9999" data-tokens="OTRO">OTRO</option>
                                    @foreach($conductores as $con)
                                    <option value='{{$con->ConductorId}}' data-tokens='{{$con->Descripcion}}'>
                                        {{$con->Descripcion}}</option>
                                    @endforeach
                                </select>

                            </span>
                        </div>
                        <div class="col-md-2 offset-md-1">
                            <center>
                                <p class="card-category"> Placa:</p>
                            </center>
                            <input type="text" name="placa" id="placa" class="form-control" value="">
                        </div>

                    </div>

                    <div id="idagregarconductor" class="row" style="display:none">


                        <div id="ingresarnuevoconductor" class="col-md-2 offset-md-2">
                            <center>
                                <p class="card-category"> Cedula:</p>
                            </center>
                            <input type="number" name="cedulaconductor" id="cedulaconductor" class="form-control"
                                value="">
                        </div>
                        <div class="col-md-4 offset-md-1">
                            <center>
                                <p class="card-category"> Nombre Conductor:</p>
                            </center>
                            <input type="text" name="nombreconductor" id="nombreconductor" class="form-control"
                                value="">
                        </div>

                    </div>

                    <input type="text" name="permisosalida" id="permisosalida" class="form-control"
                        style='display:none;' value="0">


                    <center> <button type="button" style='display:none;' id="botonmodalvalidarsalidacanal"
                            class="btn btn-success" data-toggle="modal"
                            data-target="#modalvalidarsalidasinsolicitud">validar salida</button></center>

                    <!--Modal: modalPush-->

                    <div class="modal fade" id="modalvalidarsalidasinsolicitud" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--
                                <div class="modal-header">

                                    <h5 class="modal-title" id="exampleModalLabel">AUTORIZAR SALIDA DE CANAL</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>-->



                                <div class="modal-body">

                                    <center>

                                        <h5>ESTA CANAL NO ESTA AUTORIZADA PARA EL DIA DE HOY</h5>

                                        <h5>¿Desea validar la salida de la canal?</h5>
                                    </center>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">email</i>
                                            </span>
                                        </div>

                                        <input type="email" id="emailvalidacion" name="emailvalidacion"
                                            class="form-control" placeholder="{{ __('Email...') }}"
                                            value="{{ old('email', '') }}" required>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>
                                        <input type="password" name="passwordvalidacion" id="passwordvalidacion"
                                            class="form-control" placeholder="{{ __('Password...') }}"
                                            value="{{ !$errors->has('password') ? "" : "" }}" required>
                                    </div>



                                    <center>
                                        <strong>
                                            <h5>Motivo de autorización:</h5>
                                        </strong>
                                    </center>

                                    <textarea placeholder="Escriba el motivo de la autorización" name="Motivo"
                                        class="form-control text-center" id="Motivo" rows="3" required></textarea>


                                </div>

                                <div class="col-md-5 offset-md-4">
                                    <center>
                                        <button type="button" id="validarsalidacanal" class="btn btn-primary">Validar
                                            Canal</button>
                                    </center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Modal: modalPush-->



                    <!--Modal: modalPush-->



                    <div class="card-body">
                        <div class="col-md-4">

                            <!--Alert de las ventanas emergentes-->

                            <button class="btn btn-primary btn-block" style='display:none;' id="botonnotificacion"
                                onclick="md.showNotificationconfirmacion('top','right')">Top Right</button>

                            <button class="btn btn-primary btn-block" style='display:none;'
                                id="botonnotificacionyaexiste" onclick="md.showNotificationsuccess('top','right')">Top
                                Right</button>


                            <button class="btn btn-warning btn-block" style='display:none;'
                                id="botonnotificacionVexistenciacanal"
                                onclick="md.showNotificationVexistenciacanal('top','right')">Top
                                Right</button>
                        </div>
                        <center> <video id="preview"></video></center>
                    </div>
                    <input type="hidden" name="idcontentcompleto" id="idcontentcompleto" class="form-control"
                        style='display-none;' value="">

                    <div class="col-md-10 offset-md-1">
                        <div class="table-responsive material-datatables">
                            <table id="tabladespacho" class=" table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead class=" text-primary">
                                    <tr>
                                        <th data-priority="1">
                                            Codigo
                                        </th>
                                        <th data-priority="1">
                                            Observación
                                        </th>
                                        <th class="text-center" data-priority="1">

                                            Opciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="añadir">
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js">
</script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {


    $("#idagregarconductor").hide();



    window.onbeforeunload = function() {
        return "¿Desea recargar la página web?";
    };

    //..................LECTOR CODIGO QR..........................//

    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview'),
        continuous: true,
        mirror: false,
        refractoryPeriod: 1000,
        scanPeriod: 1
    });


    scanner.addListener('scan', function(content) {

        verificarlistas(content);

    });

    $('#camarafrontal').on("click", function() {

        Instascan.Camera.getCameras().then(cameras => {
            this.cameras = cameras
            if (cameras.length > 0) {

                if (cameras[0]) {
                    activeCameraId = cameras[0].id;
                    scanner.start(cameras[0]);
                } else {
                    alert("No tiene camara frontal");
                }

            } else {
                console.error("Não existe câmera no dispositivo!");
            }
        });

    });

    $('#camaratrasera').on("click", function() {


        Instascan.Camera.getCameras().then(cameras => {
            this.cameras = cameras
            if (cameras.length > 0) {

                if (cameras[1]) {
                    activeCameraId = cameras[1].id;
                    scanner.start(cameras[1]);
                } else {
                    alert("No tiene camara Trasera");
                }
            } else {
                console.error("Não existe câmera no dispositivo!");
            }
        });


    });



    //..................BORRAR FILA DE CANAL TEMPORALMENTE...........................//


    $('#tabladespacho').on('click', '.btn_remove', function() {

        $(this).parents('tr').remove();
    });


    //..............Funcion selecccionar conductor.................//

    $('#seleccioneconductor').change(function() {

        $("#placa").empty();

        var conductor = $("#seleccioneconductor").val();

        if (conductor == "9999") {
            $("#idagregarconductor").show();
        }


        if (conductor != "" && conductor != "9999") {
            var valor = "";
            $("#idagregarconductor").hide();
            @foreach($conductores as $conduct)

            valor = '{{ $conduct->ConductorId }}';
            //console.warn(valor);

            if (conductor == valor) {
                //alert("La placa es "+ conductor);
                $("#placa").val('{{ $conduct->Placa }}');
            }

            @endforeach
        }

    });

    //..............Funcion enviar canales.................//


    function salidacanal(content) {
        var resultado = content.substr(3);
        var conductor = $("#seleccioneconductor").val();
        var motivo = $('#Motivo').val();

        if (conductor == "" || conductor == null) {

            $("#cerrarventanaenviardespacho").trigger("click");
            $("#botonnotificacionVexistenciacanal").trigger("click");


        } else {

            var placa = $("#placa").val();

            if (conductor === "9999") {

                var CCconductor = $("#cedulaconductor").val();
                var nombreconductor = $("#nombreconductor").val();

                if (conductor == "9999" && CCconductor != "" && nombreconductor != "" && placa != "") {

                    var idcanal = content;
                    var permisosalida = $("#permisosalida").val();



                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        type: "GET",
                        url: "{{ route('enviarcanales') }}",
                        data: {
                            "_token": _token,
                            "Dconductor": conductor,
                            "idcanal": idcanal,
                            "permisosalida": permisosalida,
                            "CCconductor": CCconductor,
                            "nombreconductor": nombreconductor,
                            "placa": placa,
                            "motivo": motivo
                        },
                        success: function(data) {

                            console.warn(data);

                            $("#botonnotificacion").trigger("click");

                            if (data > 0) {

                                var primerafila = '<tr class="datos"><td>' + content +
                                    '</td>' +
                                    '<td></td>' +
                                    '<td><button type="button" name="remove" id="' +
                                    content +
                                    '" class="btn btn-danger btn_remove">Quitar</button></td></tr>';
                                $("#añadir").append(primerafila);

                            }else{
                               
                                $("#botonnotificacionyaexiste").trigger("click");
                            }
                            // location.reload();


                        }
                    });

                } else {

                    $("#cerrarventanaenviardespacho").trigger("click");
                    $("#botonnotificacionVexistenciacanal").trigger("click");

                }

            } else {

                var idcanal = content;
                var permisosalida = $("#permisosalida").val();

                var _token = $('input[name="_token"]').val();
                var CConductor = "";
                var nombreconductor = "";

                $.ajax({
                    type: "GET",
                    url: "{{ route('enviarcanales') }}",
                    data: {
                        "_token": _token,
                        "Dconductor": conductor,
                        "idcanal": idcanal,
                        "permisosalida": permisosalida,
                        "CCconductor": CCconductor,
                        "nombreconductor": nombreconductor,
                        "placa": placa,
                        "motivo": motivo

                    },
                    success: function(data) {


                        console.warn(data);


                        if (data > 0) {

                            $("#permisosalida").val('0');

                            var primerafila = '<tr class="datos"><td>' + content +
                                '</td>' +
                                '<td></td>' +
                                '<td><button type="button" name="remove" id="' +
                                content +
                                '" class="btn btn-danger btn_remove">Quitar</button></td></tr>';
                            $("#añadir").append(primerafila);
                            $("#botonnotificacion").trigger("click");
                        }else{
                               
                               $("#botonnotificacionyaexiste").trigger("click");
                           }

                        //  location.reload();
                    }
                });

            }

        }
    }


    //..............Funcion verificar canales para añadir sin solicitud.................//

    // function validarsalidacanal(content) {


    $('#validarsalidacanal').on("click", function() {


        var _token = $('input[name="_token"]').val();
        var _email = $('#emailvalidacion').val();
        var password = $('#passwordvalidacion').val();
        var motivo = $('#Motivo').val();

        console.warn(_email);
        console.warn(password);
        var content = $('#idcontentcompleto').val();
        $.ajax({

            type: "GET",
            url: "{{ route('permisocanal') }}",
            data: {
                "_token": _token,
                "emaildato": _email,
                "passdato": password
            },
            success: function(data) {


                if (data == "Es la misma") {

                    $("#permisosalida").val('1');

                    salidacanal(content);

                    $('#modalvalidarsalidasinsolicitud').modal('hide');
                }


            }
        });

    });
    // }



    //..............Funcion verificar lista de canales.................//

    function verificarlistas(content) {

        var resultado = content.substr(3);
        var qr = resultado;
        console.warn(qr);
        var _token = $('input[name="_token"]').val();


        $.ajax({
            type: "GET",
            url: "{{ route('verificarlista') }}",
            data: {
                "_token": _token,
                "qr": qr
            },
            success: function(data) {


                if (data.length === 0) {

                    $('#idcontentcompleto').val(content);
                    $("#botonmodalvalidarsalidacanal").trigger("click");

                    //  validarsalidacanal(content);


                } else {


                    salidacanal(content);

                }
            }
        });
    }



});
</script>
@endsection

@endsection