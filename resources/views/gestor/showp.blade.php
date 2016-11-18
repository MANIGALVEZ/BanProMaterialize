@extends('layouts.app')

@section('content')

    <table class="table table-bordered tablitashow"  >
        <thead>
        <th>Id</th>
        <th>Nombre Proyecto</th>
        <th>Sector enfocado</th>
        <th>Linea Tecnológica</th>
        <th>Estado</th>
        <th>Usuario</th>
        <th>Imagen</th>
        </thead>
        
         <tbody>
           <td>{{$query->id}}</td>
           <td>{{$query->nombrep}}</td>
           <td>{{$query->sectorenfocado}}</td>
           <td>
             <ul>
               <?php foreach ($lineas_proyecto as $key => $linea): ?>
                  <?php $lineas = DB::table("lineas")->where("id", $linea->lineas_id)->get(); ?>
                  <?php foreach ($lineas as $key => $linea): ?>
                  <li>{{ $linea->linea }}</li>
                  <?php endforeach ?>
               <?php endforeach ?>
             </ul>
           </td>
           <td>
               @if(Auth::user()->tiporol == 'usuario')
                   <?php $estados = DB::table("estadosdeproyectos")->get(); ?>
                   <?php $actualizarestados = DB::table("proyectos")->where("estadosdeproyectos_id", $query->estadosdeproyectos_id)->get(); ?>
                       @foreach($estados as $estado)
                           @if($estado->id == $query->estadosdeproyectos_id)
                               <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                           @endif
                       @endforeach
               @endif

               @if(Auth::user()->tiporol == 'gestor')
               <?php $estados = DB::table("estadosdeproyectos")->where('id', '<>', '1')->get(); ?>
               <form class="form-inline">
                   <select class="form-control estadoProyectoDetalle" name="" data-proyecto="{{ $query->id }}">
                       @foreach($estados as $estado)
                           @if($estado->id == $query->estadosdeproyectos_id)
                               <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                           @else
                               <option value="{{$estado->id}}">{{$estado->estado}}</option>
                           @endif
                       @endforeach
                   </select>
               </form>
               @endif
           </td>
           <td>{{$query->user->nameu}}</td>  
           <td><img src="/{{$query->imagen}}" width="100" class="img-thumbnail"></td>
         </tbody>
    </table>

    <div class="bloquisito">
        <table  class="table table-bordered tablitashow">
            <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>Resumen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$query->descripcion}}</td>
                    <td> {{$query->resumen}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="bloquisito">
    @if(Auth::user()->tiporol == 'gestor')
        <strong>Usuarios Inscritos</strong>
        <table class=" table table-bordered tablitashow">
            <thead>
            <tr>
                <th>Usuario</th>
                <th>Estado</th>
            </tr>
            </thead>
            @foreach($usuarios as $usu)
                <tbody>
                <tr>
                    <td>{{$usu->nameu}}</td>
                    <td>
                        <?php $estadosprouser = DB::table("estadosproyectosusers")->get(); ?>
                        <select class="form-control estadoProyectoUsuario" data-idprouser='<?php echo DB::table("proyectosusers")->where("proyectos_id", $query->id)->where("users_id", $usu->id)->value("id"); ?>'>
                            @foreach($estadosprouser as $estado)
                                <?php $tabla = DB::table("proyectosusers")->where("proyectos_id", $query->id)->where("users_id", $usu->id)->value("estadosproyectosusers_id"); ?>
                                @if($estado->id == $tabla)
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
    @endif
    <div class="bloquisito usucliente">

    @if(Auth::user()->tiporol == 'usuario')
        <strong>Usuarios Inscritos</strong>
        <div class="cajascontent usuariosInscritos">

            @foreach($usuarios2 as $usu)
                <li>{{$usu->nameu}}</li>
                <?php $estadosprouser = DB::table("estadosproyectosusers")->get(); ?>
            @endforeach
        </div>
    </div>
    @endif
    <div class="bloquisito">
           <strong>Comentarios</strong>
        <div  class="cajascontent comentarios">

             <?php foreach ($comentariop as $key => $comentario): ?>
                  <?php $comentarios = DB::table("comentarios")->where("id", $comentario->id)->get(); ?>
                  <?php foreach ($comentarios as $key => $comentario): ?>
                  <li class="nombre">
                  <?php echo DB::table("users")->where("id", $comentario->usuario_id)->value("nameu"); echo ":" ?>
                  {{ $comentario->comentario }}
                      </li>
                  <?php endforeach ?>
               <?php endforeach ?>
        </div>
    </div>

    <form action="{{ url('/comentario/'.$query->id)}}" method="POST">
        {{ csrf_field() }}
        <textarea id="comentario"  type="text" class="form-control" placeholder="Escriba el comentario deseado" rows="2" name="comentario" value="{{ old('comentario') }}"  maxlength="255" required="required"></textarea>
        <button type="submit" class="btn btn-success btnEnviar" name="enviar" >
            Enviar
         </button>
    </form>


    <!-- Modal para agregar un resumen cuando el proyecto pasa a estado Reclutando o En desarrollo  -->
    <form action="{{url('resumenPD')}}" method="POST">
        {{ csrf_field() }}
        <div class="modal fade modalResumenDetalle" id="modalResumenDetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <button type="submit" class="btn btn-secondary" data-dismiss="modalResume">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



@endsection