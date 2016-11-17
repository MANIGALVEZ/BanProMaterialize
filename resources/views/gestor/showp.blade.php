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
               <?php $estados = DB::table("estadosdeproyectos")->get(); ?>
               <?php $actualizarestados = DB::table("proyectos")->where("estadosdeproyectos_id", $query->estadosdeproyectos_id)->get(); ?>
                   @foreach($estados as $estado)
                       @if($estado->id == $query->estadosdeproyectos_id)
                           <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                       @endif
                   @endforeach
           </td>
           <td>{{$query->user->nameu}}</td>  
           <td><img src="/{{$query->imagen}}" width="100" class="img-thumbnail"></td>
         </tbody>

    </table>
     <h4>Descripcion</h4>
        <div  class="cajascontent">
          <p >{{$query->descripcion}}</p>
        </div>

     <h4>Resumen</h4>
        <div  class="cajascontent">
        <p>
            {{$query->resumen}}
        </p>
        </div>
           <h4>Comentarios</h4>
        <div  class="cajascontent">

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
    @if(Auth::user()->tiporol == 'gestor')

   <h4>Usuarios Inscritos</h4>
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
    @endif

    <form action="{{ url('/comentario/'.$query->id)}}" method="POST">
        {{ csrf_field() }}
        <textarea id="comentario" type="text" class="form-control" placeholder="Escriba el comentario deseado" rows="2" name="comentario" value="{{ old('comentario') }}"  maxlength="255" required="required"></textarea>
        <button type="submit" class="btn btn-success" name="enviar" style="border: none;">
            Enviar
         </button>
    </form>

@endsection