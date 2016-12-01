@extends('layouts.app')
@section('content')


<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<body>
    <div class="image-container set-full-height" style="background-image: url('../img/madera.jpg')">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="fresh-table">
                            <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                                    Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
                            -->
                            <div class="toolbar">
                                <a type="button" class="btn btn-success btn-actualizar" data-toggle="tooltip" data-placement="top" title="Actualizar"><i class="material-icons">autorenew</i></a>
                                <h3 class="wizard-title centrar">Administración de Usuarios</h3>
                            </div>

                            <table id="fresh-table" class="table" >
                                <thead>
                                {{--<th data-field="id">ID</th>--}}
                                <th data-field="nombrep" data-sortable="true">Proyecto</th>
                                <th data-field="usuario_id" data-sortable="true">usuario</th>
                                <th data-field="estadosdeproyectos_id" data-sortable="true">Estado</th>
                                </thead>
                                <tbody>
                                    @foreach($proyectosusers as $puti)
                                        <tr class="centrar">
                                        {{--<td>{{$puti->id}}</td>--}}
                                            <td>
                                                <?php $proyec = DB::table('proyectos')->where('id', "=", $puti->proyectos_id)->get();?>
                                                @foreach($proyec as $usu)
                                                    {{$usu->nombrep}}
                                                @endforeach
                                            </td>
                                            <td>
                                                <?php $usuario = DB::table('users')->where('id', "=", $puti->users_id)->get();?>
                                                @foreach($usuario as $usu)
                                                    {{$usu->nameu}}
                                                @endforeach
                                            </td>
                                            <td>
                                                <?php $estadosprouser = DB::table("estadosproyectosusers")->get(); ?>
                                                <select class="form-control estadoProyectoUsuario" data-idprouser="{{ $puti->id }}">
                                                    @foreach($estadosprouser as $estado)
                                                        <?php $tabla = DB::table("proyectosusers")->get(); ?>
                                                        @if($estado->id == $puti->estadosproyectosusers_id)
                                                            <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                                                        @else
                                                            <option value="{{$estado->id}}">{{$estado->estado}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
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
            showRefresh: false,
            search: true,
            showToggle: false,
            showColumns: true,
            pagination: true,
            striped: false,
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