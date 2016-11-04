@extends('layouts.app')

@section('content')


        <!--Funcion modicar fecha para mostrarse por dia, mes y año-->
<?php function fechalatina($fecha)
{
    $nfecha=date('d/m/y',strtotime($fecha));
    return $nfecha;
}
?>

<article>
    <label>
        <H2>
            Banco de Proyectos Gestor
        </H2>
    </label>
</article>

<br><br>

<table class="table table-hover">
    <thead>
    <th>Id</th>
    <th>Fecha</th>
    <th>Nombre Proyecto</th>
    <th>Sector enfocado</th>
    <th>Linea(s) Tecnológica(s)</th>
    <th>Estado</th>
    <th>Usuario</th>
    <th>Opciones</th>
    </thead>
    @foreach($query as $row)
        <tbody>
        <td>{{$row->id}}</td>
        <td>{{fechalatina($row->created_at)}}</td>
        <td>{{$row->nombrep}}</td>
        <td>{{$row->sectorenfocado}}</td>
        <?php $lineasproyectos = DB::table("lineasproyectos")->where("proyectos_id", $row->id)->get(); ?>
        <td>
            <ul>
                <?php if (count($lineasproyectos) > 0): ?>
                @foreach($lineasproyectos as $lineaproyecto)
                    <?php $lineas = DB::table("lineas")->where("id", $lineaproyecto->lineas_id)->get(); ?>
                    @foreach($lineas as $linea)
                        <li> <?php echo $linea->linea; ?> </li>
                    @endforeach
                @endforeach
                <?php endif ?>
            </ul>
        </td>
        <?php $estados = DB::table("estadosdeproyectos")->get(); ?>
        <td>
            @if(Auth::user()->tiporol == 'gestor')
                <select class="form-inline estadoProyecto" name="" data-proyecto="{{ $row->id }}">
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
        <td>
            <?php $usuario = DB::table('users')->where('id', "=", $row->usuario_id)->get();?>
            @foreach($usuario as $usu)
                {{$usu->nameu}}
            @endforeach
        </td>
        <td>
            @if(Auth::user()->tiporol == 'gestor')
                <a href="show/{{$row->id}}" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Detalles"><i class="glyphicon glyphicon-list-alt"></i></a>
                {{--<a href="eliminar/{{$row->id}}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>--}}
            @endif

        </td>
        </tbody>
    @endforeach
</table>
{!!$query->render()!!}


        <!-- Modal para agregar un resumen cuando el proyecto pasa a estado Reclutando o En desarrollo  -->
<form action="{{url('resumenP')}}" method="POST">
    {{ csrf_field() }}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Añadir Resumen</h4>
                </div>
                <div class="modal-body">
                        <textarea class="form-control" rows="5" name="texto" id="texto">
                        </textarea>
                    <input type="hidden" name="idEstado" id="idEstado">
                    <input type="hidden" name="idProyecto" id="idProyecto">
                </div>
                <div class="modal-footer" >
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    //funcion ajax para cambiar de estado en tiempo real y auto actualizarse
    $(".estadoProyecto").change(function () {
        $idEstado = $(this).val();
        $idProyecto = $(this).attr("data-proyecto");


        if ($idEstado == 2 || $idEstado == 5)
        {
            $(".modal").modal("show");
            $('#idEstado').val($idEstado);
            $('#idProyecto').val($idProyecto);
            $.get('consultaP/'+$idProyecto, {idp: $idProyecto}, function(data)
            {
                //console.log(data);
                $('#texto').val(data);
            });


        }

        else
        {
            $.get("estadoProyecto", {ide: $idEstado, idp: $idProyecto});
            window.location.replace("");
        }

    })
</script>

@endsection
