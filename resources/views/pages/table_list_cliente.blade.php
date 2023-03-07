@extends('layouts.app', ['activePage' => 'Clientes Institucionales', 'titlePage' => __('Table List')])


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
                        <h4 class="card-title ">Lista clientes institucionales</h4>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive material-datatables">
                            <table id="datatables" class=" table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead class=" text-primary">
                                    <tr>
                                        <th data-priority="1">
                                            Nit
                                        </th>
                                        <th data-priority="1">
                                            Nombre
                                        </th>
                                        <th>
                                            Telefono
                                        </th>
                                        <th>
                                            Vendedor
                                        </th>
                                     
                                        <th>
                                            Cupo
                                        </th>
                                        <th>
                                            Cartera
                                        </th>
                                        <th>
                                            Disponible
                                        </th>
                                        <th>
                                            Vencido
                                        </th>
                                        <th data-priority="1">
                                            Opciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($users as $usuario)
                                    <tr>
                                        <td>
                                            {{$usuario->Nit}}
                                        </td>
                                        <td>
                                            {{$usuario->Nombre}}
                                        </td>
                                        <td>
                                            {{$usuario->Telefono}}-{{$usuario->Telefono1}}
                                        </td>
                                        <td>
                                            {{$usuario->VendNom}}
                                        </td>
                                      
                                        <td>
                                            {{number_format($usuario->Cupo)}}
                                        </td>
                                        <td>
                                            {{number_format($usuario->Cartera)}}
                                        </td>
                                        <td 
                                        
                                        @if($usuario->Disponible<0)
                                        
                                        style="background-color: #E67760"
                                        @endif
                                        
                                        >
                                            {{number_format($usuario->Disponible)}}
                                        </td>
                                        <td
                                        @if($usuario->Vencido>0)
                                        
                                        style="background-color: #E67760"
                                        @endif
                                        
                                        
                                        
                                        >
                                            {{number_format($usuario->Vencido)}}
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ url('infocliente',['codigo'=>$usuario->Nit])}}"
                                                title="Informacion cliente"
                                                class="btn btn-link btn-info btn-just-icon like">
                                                <i class="material-icons">assignment_ind</i>
                                            </a>
                                            <a href="{{ url('carteracliente',['codigo'=>$usuario->Nit])}}"
                                                title="Cartera cliente"
                                                class="btn btn-link btn-info btn-just-icon like">
                                                <i class="material-icons">account_balance_wallet</i>
                                            </a>
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


@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.material.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    alert("abrio");
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }
    });


    var table = $('#datatable').DataTable();

    // Edit record
    table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record
    table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
    });

    //Like record
    table.on('click', '.like', function() {
        alert('You clicked on Like button');
    });

});
</script>
@endsection

@endsection