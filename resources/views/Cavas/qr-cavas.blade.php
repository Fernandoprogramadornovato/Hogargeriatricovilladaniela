@extends('layouts.app', ['activePage' => 'QR Cavas', 'titlePage' => __('Table List')])


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
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">center_focus_weak</i>
                        </div>
                        <h4 class="card-title ">Lector QR Cavas</h4>
<center>
                        <button type="button" id="camarafrontal" class="btn btn-info">
                                      Camara Frontal
                                    </button>
                                    <button type="button" id="camaratrasera" class="btn btn-info">
                                      Camara Trasera
                                    </button>
</center>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>



                    <div class="row" style="padding-left: 15px;">


                        <div class="col-md-4 offset-md-1">
                            <center>
                                <p class="card-category"> Nombre Cava:</p>
                            </center>
                            <span class="input-group-text">
                                <i class="material-icons">person</i>

                                <select class="selectpicker" data-live-search="true" data-width="auto"
                                    name="_seleccioneconductor" id="seleccionecava"
                                    data-style="btn btn-info btn-round">
                                    <option data-tokens="Conductores" value="" disabled selected>Cavas</option>
                                        @foreach ($Cavas as $cava)
                                            
                                        
                                    <option value='{{$cava->Descripcion}}' data-tokens=''>{{$cava->Descripcion}}</option>
                                        @endforeach
                                </select>

                            </span>
                        </div>
                        <div class="col-md-2 offset-md-1">
                            <center>
                                <p class="card-category"><!-- Placa:--></p>
                            </center>
                            <!--<input type="text" name="placa" id="placa" class="form-control" value="" disabled>-->
                        </div>
                        <div class="col-md-3 offset-md-1">
                            <br><br>
                            <center> <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#modalPush">Guardar Informacion</button></center>
                        </div>
                    </div>

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
                                </div>
-->
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

                                        <input type="email" id="emailvalidacion" name="emailvalidacion" class="form-control"
                                            placeholder="{{ __('Email...') }}"
                                            value="{{ old('email', 'admin@material.com') }}" required>
                                    </div>

                                <!--Dato que se envia al formulario style='display:none;'-->

                                    <input type="text" id="codigocanalavalidar"  name="codigocanalavalidar" class="form-control" value="" >
                                  
                                    <br>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>
                                        <input type="password" name="passwordvalidacion" id="passwordvalidacion"
                                            class="form-control" placeholder="{{ __('Password...') }}"
                                            value="{{ !$errors->has('password') ? "secret" : "" }}" required>
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
                    <div class="modal fade" id="modalPush" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">ALMACENAR EN CAVA</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <center>
                                        <h4>Esta seguro que desea almacenar los datos?</h4>
                                    </center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" id="cerrarventanaenviardespacho"
                                        data-dismiss="modal">Cerrar</button>
                                    <button type="button" id="enviarcava" class="btn btn-danger">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal: modalPush-->



                    <div class="card-body">
                        <div class="col-md-4">

                            <!--Alert de las ventanas emergentes-->

                            <button class="btn btn-primary btn-block" style='display:none;' id="botonnotificacion"
                                onclick="md.showNotificationCava('top','right')">Top Right</button>

                            <button class="btn btn-primary btn-block" style='display:none;'
                                id="botonnotificacionyaexiste" onclick="md.showNotificationsuccess('top','right')">Top
                                Right</button>


                            <button class="btn btn-warning btn-block" style='display:none;'
                                id="botonnotificacionVexistenciacanal"
                                onclick="md.showNotificationExisteCava('top','right')">Top
                                Right</button>
                        </div>
                        <center> <video id="preview"></video></center>
                    </div>

                    <div class="col-md-10 offset-md-1">
                        <div class="table-responsive material-datatables">
                            <table id="tablacavas" class=" table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead class=" text-dark">
                                    <tr>
                                        <th class="text-center" data-priority="1">
                                            Codigo QR
                                        </th>
                                        <th class="text-center" data-priority="1">
                                            Llave
                                        </th>
                                        <th class="text-center" data-priority="1">
                                            Codigo Animal
                                        </th>
                                        <th class="text-center" data-priority="1">
                                            Especie
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<script type="text/javascript">

//----------------------------------Activavion de Camaras-----------------------------//
$(document).ready(function() {


//..................LECTOR CODIGO QR..........................//

let scanner = new Instascan.Scanner({
    video: document.getElementById('preview'),
    backgroundScan: true,
    scanPeriod: 2,
    mirror: false
});


scanner.addListener('scan', function(content) {


    verificarlista(content);

});

$('#camarafrontal').on("click", function() {


    Instascan.Camera.getCameras().then(cameras => {
    this.cameras = cameras
    if (cameras.length > 0) {

        console.warn(cameras);
        if(cameras[0]){
            activeCameraId = cameras[0].id;
        scanner.start(cameras[0]);
        }else{
            alert("No tiene camara frontal");
        }


        
    } else {
        console.error("No existe una camara en el dispositivo");
    }
});




});

$('#camaratrasera').on("click", function() {


    Instascan.Camera.getCameras().then(cameras => {
    this.cameras = cameras
    if (cameras.length > 0) {

        if(cameras[1]){
            activeCameraId = cameras[1].id;
        scanner.start(cameras[1]);
        }else{
            alert("No tiene camara Trasera");
        }
    } else {
        console.error("No existe una camara en el dispositivo");
    }
});




});



//..................BORRAR FILA DE CAVAS TEMPORALMENTE...........................//


$('#tablacavas').on('click', '.btn_remove', function() {

    $(this).parents('tr').remove();

});

//..............Funcion enviar cava.................//
$('#enviarcava').on("click", function() {

var canales = new Array();
var cava = $("#seleccionecava").val();


var resultadoenviocanal = $('#añadir').find('tr').length;

if (resultadoenviocanal == 0 || cava == "" || cava == null) {

    $("#cerrarventanaenviardespacho").trigger("click");
    $("#botonnotificacionVexistenciacanal").trigger("click");


} else {

    $('#añadir tr').each(function() {
        var codigoqr = $(this).find("td")[0].innerHTML;
        var llaveanimal = $(this).find("td")[1].innerHTML;
        var canimal = $(this).find("td")[2].innerHTML;
        var eanimal = $(this).find("td")[3].innerHTML;
    


        valor = new Array(codigoqr, llaveanimal, canimal, eanimal);
        canales.push(valor);
    });
    var _token = $('input[name="_token"]').val();
    $.ajax({
        type: "GET",
        url: "{{ route('enviarcavas') }}",
        data: {
            "_token": _token,
            "Ccava": cava,
            "Canales": canales
        },
        success: function(data) {



            location.reload();


        }
    });

}
});




//..............Funcion verificar canales para añadir sin solicitud.................//

function validarsalidacanal(content) {


    $('#validarsalidacanal').on("click", function() {



        var _token = $('input[name="_token"]').val();
        var _email = $('#emailvalidacion').val();
        var password = $('#passwordvalidacion').val();

        console.warn(_email);
        console.warn(password);

        $.ajax({

            type: "GET",
            url: "{{ route('permisocanal') }}",
            data: {
                "_token": _token,
                "emaildato": _email,
                "passdato": password
            },
            success: function(data) {


console.warn("papu");
console.warn(data);

var resultadotr = $('#añadir').find('tr').length;

if (resultadotr == 0) {

var fila = '<tr class="datos"><td>' + content +
    '</td>' +
    '<td stile="background-color: #B83E1F;">Permiso de salida</td>' +
    '<td>' +
    '<button type="button" name="remove" id="' +
    content +
    '" class="btn btn-danger btn_remove">Eliminar</button></td></tr>';
$("#añadir").append(fila);
$('#modalvalidarsalidasinsolicitud').modal('hide');
$("#botonnotificacion").trigger("click");

} else {

var cont = 0;
$('#añadir tr').each(function() {
    var campo1 = "";
    var resultado = $(this).find("td")[0].innerHTML;
    console.warn(resultado);
    if (resultado == content) {
        cont = 1;
        $('#modalvalidarsalidasinsolicitud').modal('hide');
        $("#botonnotificacionyaexiste").trigger("click");
        
    } else {
        cont = 0;

    }
});

if (cont == 0) {

    var fila = '<tr class="datos"><td>' + content +
        '</td>' +
        '<td stile="background-color: #B83E1F;">Permiso de salida</td>' +
        '<td>' +
        '<button type="button" name="remove" id="' +
        content +
        '" class="btn btn-danger btn_remove">Eliminar</button></td></tr>';
    $("#añadir").append(fila);
    $('#modalvalidarsalidasinsolicitud').modal('hide');
    $("#botonnotificacion").trigger("click");

}
}

            }
        });

    });
}



//..............Funcion verificar lista de canales.................//

function verificarlista(content) {
        var resultado = content.substr(3);
        var qr = resultado;
        console.warn(qr);
        var _token = $('input[name="_token"]').val();
        $.ajax({
            type: "GET",
            url: "{{ route('verificarcava') }}",
            data: {
                "_token": _token,
                "qr": qr
            },
            success: function(data) {


console.warn("Retorno resultado");
console.warn(data);




if(data.length === 0) {


$("#codigocanalavalidar").val(content);
$("#botonmodalvalidarsalidacanal").trigger("click");



//validarsalidacanal(content);


} else {

var resultadotr = $('#añadir').find('tr').length;

if (resultadotr == 0) {

 //   $.each(obj, function(key, value) {
 // console.log(value);
//});


    $.each(data,function(key,value){
  
        console.warn("Ingreso");
        console.warn(value.Descripcion);
        var primerafila = '<tr class="datos text-center"><td>' + content +
        '</td>' +
        '<td class="datos text-center">'+value.AnimalLlave+'</td>' +
        '<td class="datos text-center">'+value.AnimalCodigo+'</td>' +
        '<td class="datos text-center">'+value.Descripcion+'</td>' +
        '<td><button type="button" name="remove" id="' +
        content +
        '" class="btn btn-danger btn_remove">Quitar</button></td></tr>';
    $("#añadir").append(primerafila);
        });
    $("#botonnotificacion").trigger("click");
} else {

    var cont = 0;
    $('#añadir tr').each(function() {
        var campo1 = "";

        var resultado = $(this).find("td")[0].innerHTML;
        console.warn(resultado);


        if (resultado == content) {
            cont = 1;
            $("#botonnotificacionyaexiste").trigger("click");
            return false;
        } else {
            cont = 0;

        }
    });

    if (cont == 0) {

        $.each(data,function(key,value){
  
  console.warn("Ingreso");
  console.warn(value.Descripcion);
  var primerafila = '<tr class="datos text-center"><td>' + content +
  '</td>' +
  '<td class="datos text-center">'+value.AnimalLlave+'</td>' +
  '<td class="datos text-center">'+value.AnimalCodigo+'</td>' +
  '<td class="datos text-center">'+value.Descripcion+'</td>' +
  '<td><button type="button" name="remove" id="' +
  content +
  '" class="btn btn-danger btn_remove">Quitar</button></td></tr>';
$("#añadir").append(primerafila);
  });
        $("#botonnotificacion").trigger("click");

    }
}
}



}




            
        });
    }



});
</script>


@endsection

@endsection