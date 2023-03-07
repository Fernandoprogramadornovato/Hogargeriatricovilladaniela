@extends('layouts.app', ['activePage' => '', 'titlePage' => __('')])


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
                   
                    <div class="card-body">

                    <img src="./material/img/1-11.png" style="width: 20%;" />
                        <div class="table-responsive">
                            <table  class="table"
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

<script type="text/javascript">

</script>
@endsection

@endsection