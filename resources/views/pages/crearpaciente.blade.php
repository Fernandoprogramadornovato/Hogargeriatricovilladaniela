@extends('layouts.app', ['activePage' => 'Pacientes', 'titlePage' => __('Table List')])


<style>



</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.material.min.css">
<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet"/>
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

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



          <div class="col-md-10 col-12 mr-auto ml-auto">
            <!--      Wizard container        -->
            <div class="wizard-container">
              <div class="card card-wizard" data-color="rose" id="wizardProfile">
                <form action="" method="">
                  <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                  <div class="card-header text-center">
                    <h3 class="card-title">
                      Creacion de Paciente
                    </h3>
                    <h5 class="card-description">En esta seccion se realiza la creacion del paciente.</h5>
                  </div>
                  <div class="wizard-navigation">
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                          Paciente
                        </a>
                      </li>
                      <!--
                      <li class="nav-item">
                        <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                          Account
                        </a>
                      </li>
                      -->
                      <li class="nav-item">
                        <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                          Datos Personales
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="about">
                        <h5 class="info-text"> Información basica</h5>
                        <div class="row justify-content-center">
                          <div class="col-sm-4">
                            <div class="picture-container">
                              <div class="picture">
                                <img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                <input type="file" id="wizard-picture">
                              </div>
                              <h6 class="description">Foto</h6>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="input-group form-control-lg">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="material-icons">face</i>
                                </span>
                              </div>
                              <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Nombre paciente</label>
                                <input type="text" class="form-control" id="nombrepaciente"  required>
                              </div>
                            </div>
                            <div class="input-group form-control-lg">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="material-icons">record_voice_over</i>
                                </span>
                              </div>
                              <div class="form-group">
                                <label for="exampleInput11" class="bmd-label-floating">Cedula</label>
                                <input type="number" class="form-control" id="cedula"  required>
                              </div>
                            </div>
                            <div class="input-group form-control-lg">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="material-icons">face</i>
                                </span>
                              </div>
                              <div class="form-group col col-lg-4">
                                <label for="exampleInput1" class="bmd-label-floating">Estado</label>
                                <select class="selectpicker" id="estado" data-style="btn btn-primary btn-round" title="Single Select" data-size="7">
                                  <option disabled selected>Seleccione ...</option>
                                  <option value="1">Activo</option>
                                  <option value="2">Inactivo</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="address">
                        <div class="row justify-content-center">
                          <div class="col-sm-12">
                            <h5 class="info-text"> Datos personales </h5>
                          </div>
                          <div class="col-sm-7">
                            <div class="form-group">
                              <label>Dirección</label>
                              <input type="text" id="direccion" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label>Telefono</label>
                              <input type="number" id="telefono" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-group">
                              <label>Ciudad</label>
                              <input type="text" id="ciudad" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-group">
                              <label>EPS</label>
                              <input type="text" id="eps"  class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-group">
                              <label>Servicio Funebre</label>
                              <input type="text" id="serviciofunebre" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-group">
                            <label>Fecha Nacimiento</label>
                              <div class='input-group date' >
                                <input type='date' class="form-control" id='datetimepicker1'>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                    <button class="btn btn-warning btn-block" style='display:none;'
                                id="botonnotificacionexitoañadirconductor"
                                onclick="md.showNotificationexitoañadirconductor('top','right')">Top
                                Right</button>
                    
                  <div class="card-footer">
                    <div class="mr-auto">
                      <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" value="Anterior">
                    </div>
                    <div class="ml-auto">
                      <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Siguiente">
                      <input type="button" id="guardapacientes" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish" value="Finalizar" style="display: none;">
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </form>
              </div>
            </div>
            <!-- wizard container -->
          </div>

    </div>
</div>

                  
@section('script')

<script src="{{ asset('material') }}/js/demo.js"></script>


<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker1.min.js"></script>
<script src="{{ asset('material') }}/js/plugins/bootstrap-selectpicker.js"></script>
<script src="{{ asset('material') }}/js/plugins/fullcalendar1.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
 
    demo.initMaterialWizard();
      setTimeout(function() {
        $('.card.card-wizard').addClass('active');
      }, 400);

      $('#guardapacientes').on("click", function() {

        var nombrepaciente = $("#nombrepaciente").val();
        var cedula = $("#cedula").val();
        var estado = $("#estado").val();
        var direccion = $("#direccion").val();
        var telefono = $("#telefono").val();
        var ciudad = $("#ciudad").val();
        var eps = $("#eps").val();
        var serviciofunebre = $("#serviciofunebre").val();
        var datetimepicker1 = $("#datetimepicker1").val();

        var _token = $('input[name="_token"]').val();

        $.ajax({
            type: "GET",
            url: "{{ route('registrarpaciente') }}",
            data: {
                "_token": _token,
                "nombrepaciente": nombrepaciente,
                "cedula": cedula,
                "estado": estado,
                "direccion": direccion,
                "telefono": telefono,
                "ciudad": ciudad,
                "eps": eps,
                "serviciofunebre": serviciofunebre,
                "datetimepicker1": datetimepicker1,
            },
            success: function(data) {

                console.log(data);
                if(data="Guardo"){
                  console.log("ingreso al guardar");
                  $("#botonnotificacionexitoañadirconductor").trigger("click");
                }else{
                    console.log("ingreso al NOOO guardar");

                }

              

            }

        });

      });

});
</script>
@endsection

@endsection