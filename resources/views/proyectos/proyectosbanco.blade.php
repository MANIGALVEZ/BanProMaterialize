@extends('layouts.app')

@section('content')


<!--Funcion modicar fecha para mostrarse por dia, mes y a�o-->
<?php function fechalatina($fecha)
{
    $nfecha=date('d/m/y',strtotime($fecha));
    return $nfecha;
}
?>

<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<body>
    <div class="image-container set-full-height" style="background-image: url('img/madera.jpg')">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 margencien">
                        <div class="fresh-table">
                            <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                                    Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
                            -->
                            <div class="toolbar">
                                <h3 class="wizard-title centrar">Proyectos Cerrados</h3>

                                {{--<form class="form-inline col-sm-5" action="{{url('searchN')}}" method="POST">--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<input type="text" class="form-control" placeholder="Nombre del proyecto" name="nombrep">--}}
                                {{--<button type="submit" class="btn btn-success btn-round btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Filtrar por Nombre"><i class="glyphicon glyphicon-search"></i></button>--}}
                                {{--</form>--}}

                                <form class="form-inline col-md-10 margen" action="{{url('searchD')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="date" class="form-control" id="bd-desde" name="bd-desde" required="required">
                                    <input type="date" class="form-control" id="bd-hasta" name="bd-hasta" required="required">
                                    <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Filtrar por Fecha"><i class="glyphicon glyphicon-calendar"></i></button>
                                </form>

                                <?php $estados = DB::table("estadosdeproyectos")->where('id', '<>', '1')->get(); ?>
                                <form class="form-inline col-md-2 margen">
                                    <select class="form-control filtroEstado" data-toggle="tooltip" data-placement="top" title="Filtrar por Estado">
                                        <option value="">{{ "Seleccione Estado..." }}</option>
                                        @foreach($estados as $estado)
                                            <option value="{{$estado->id}}">{{$estado->estado}}</option>
                                        @endforeach
                                    </select>
                                </form>
                                <br>

                                <?php $lineas = DB::table("lineas")->get(); ?>
                                <form class="form-inline col-md-12 col-md-offset-9" >
                                    @foreach($lineas as $key => $linea)
                                        <input id="filtroLinea{{ $linea->id }}" class="filtroLinea" type="checkbox" name="lineas[]" value="{{ $linea->id }}">
                                        <label for="filtroLinea{{ $linea->id }}">{{ $linea->linea }}</label><br>
                                    @endforeach
                                </form>
                            </div>
                            <table id="fresh-table" class="table" >
                                <thead>
                                <th data-field="created_at" data-sortable="true">Fecha</th>
                                <th data-field="nombrep" data-sortable="true">Proyecto</th>
                                <th data-field="sectorenfocado" data-sortable="true">Sector</th>
                                <th data-field="linea" data-sortable="true">Linea(s) Tecnológica(s)</th>
                                <th data-field="estadosdeproyectos_id" data-sortable="true">Estado</th>
                                <th data-field="usuario_id" data-sortable="true">Usuario</th>
                                <th data-field="">Opciones</th>
                                </thead>
                                <tbody>
                                @foreach($query as $row)
                                    <tr class="letra">
                                        {{--<td>{{$row->id}}</td>--}}
                                        <td class="centrar">{{fechalatina($row->created_at)}}</td>
                                        <td class="centrar">{{$row->nombrep}}</td>
                                        <td class="centrar">{{$row->sectorenfocado}}</td>
                                        <?php $lineasproyectos = DB::table("lineasproyectos")->where("proyectos_id", $row->id)->get(); ?>
                                        <td style="text-align: justify">
                                            <ul>
                                                <?php if (count($lineasproyectos) > 0): ?>
                                                @foreach($lineasproyectos as $lineaproyecto)
                                                    <?php $lineas = DB::table("lineas")->where("id", $lineaproyecto->lineas_id)->get(); ?>
                                                    @foreach($lineas as $linea)
                                                        <li class="lineasproyectosindex"> <?php echo $linea->linea; ?> </li>
                                                    @endforeach
                                                @endforeach
                                                <?php endif ?>
                                            </ul>
                                        </td>
                                        <?php $estados = DB::table("estadosdeproyectos")->get(); ?>
                                        <td class="centrar">
                                            @if(Auth::user()->tiporol == 'gestor')
                                                <select class="form-control estadoProyecto" name="" data-proyecto="{{ $row->id }}">
                                                    @foreach($estados as $estado)
                                                        @if($estado->id == $row->estadosdeproyectos_id)
                                                            <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                                                        @else
                                                            <option value="{{$estado->id}}">{{$estado->estado}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            @endif
                                        </td>
                                        <td class="centrar">
                                            <?php $usuario = DB::table('users')->where('id', "=", $row->usuario_id)->get();?>
                                            @foreach($usuario as $usu)
                                                {{$usu->nameu}}
                                            @endforeach
                                        </td>
                                        <td class="centrar">
                                            @if(Auth::user()->tiporol == 'gestor')
                                                <a href="show/{{$row->id}}" type="button" class="btn btn-info btn-simple btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Detalles"><i class="material-icons">event_note</i></a>
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
</body>





<!-- Modal para agregar un resumen cuando el proyecto pasa a estado Reclutando o En desarrollo  -->
<form action="{{url('resumenP')}}" method="POST">
    {{ csrf_field() }}
    <div class="modal fade modalResume" id="modalResume" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Añadir Resumen</h4>
                </div>
                <div class="modal-body">
                        <textarea class="form-control" rows="5" name="texto" id="texto"></textarea>
                    <input type="hidden" name="idEstado" id="idEstado">
                    <input type="hidden" name="idProyecto" id="idProyecto">
                </div>
                <div class="modal-footer" >
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    //Script Tabla Dinamica
    var $table = $('#fresh-table'),
//            $alertBtn = $('#alertBtn'),
//            full_screen = false,
            window_height;

    $().ready(function(){

        window_height = $(window).height();
        table_height = window_height - 20;

        $table.bootstrapTable({
            toolbar: ".toolbar",
//            showRefresh: true,
            search: true,
//            showToggle: true,
            showColumns: true,
            pagination: true,
//            striped: true,
            sortable: true,
//            height: table_height,
            pageSize: 3,
            pageList: [3,6,9],

            formatShowingRows: function(pageFrom, pageTo, totalRows){
                //do nothing here, we don't want to show the text "showing x of y from..."
            },
            formatRecordsPerPage: function(pageNumber){
                return pageNumber + " rows visible";
            },
            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });
    });
</script>


@endsection
