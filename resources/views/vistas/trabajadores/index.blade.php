
@extends('layouts.index')
@push('arriba')
    <meta id="token" name="_token" content="{{ csrf_token() }}">
@endpush
@section('contenido')
    <!--
    *************************************************************************
     * Nombre........: create
     * Tipo..........: Vista
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
    -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <i class="fa fa-id-card"></i> Trabajadores
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('trabajadores/create')}}">
                                <i class="fa fa-plus"></i>  Nuevo
                            </a>
                        </div>
                    </h2>

                    @if(session()->has('message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="tablaTrabajador" class="table table-hover table-bordered color-table info-table">
                            <thead >
                            <tr>
                                <th  class="text-center">COD</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">APELLIDOS</th>
                                <th class="text-center">TIPO</th>
                                <th class="text-center">TELEFONO</th>
                                <th class="text-center">OPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trabajadores as $empleado)
                                <tr class="text-center">
                                    <td >{{$empleado->id}}</td>
                                    <td >{{$empleado->nombre}}</td>
                                    <td >{{$empleado->apellido}}</td>
                                    <td >{{$empleado->tipo}}</td>
                                    <td >{{$empleado->telefono}}</td>

                                    <td>
                                        <a href="{{url('trabajadores/'.$empleado->id)}}">
                                            <button class="btn btn-secondary">
                                                Ver
                                            </button>
                                        </a>
                                        <a href="{{url('trabajadores/'.$empleado->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                Editar
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger"
                                                onclick="modalEliminar('{{$empleado -> nombre}}', '{{url('trabajadores/'.$empleado -> id)}}')">
                                            Eliminar
                                        </button>
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
    @include('vistas.modal')

    @push('scripts')
        <script>
            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar Empleado");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar al empleado: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#tablaTrabajador').DataTable(
                    {
                        language: {
                            "decimal": "",
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
                            "infoEmpty": "",
                            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ filas",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "zeroRecords": "No se encontraron resultados.",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        },
                        "columns": [
                            {"name": "COD"},
                            {"name": "NOMBRE"},
                            {"name": "APELLIDO"},
                            {"name": "TIPO"},
                            {"name": "TELEFONO"},
                            {"name": "OPC", "orderable": false},
                        ],
                        "order": [[2, 'asc']],
                    }
                );

            });
        </script>
    @endpush()
@endsection
