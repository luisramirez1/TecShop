@extends('principal')

@section('contenido')
<br>
<div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Editar Comentario</li>
            </ol>
        </div>
    </div>

    <br>
    @include('partials.exito2') <br>

@foreach($comentario as $c)
<article id="jum">
    <form action="{{url('/editarComentario')}}/{{$c->id}}" method="POST" class="jumbotron" id="form1" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
            <section id="seccion1">
                <article class="form-group">
                    <label for="Comentario">Comentario:</label>
                    <input name="comentario" type="text" class="form-control" placeholder="Comentario" required value="{{$c->comentario}}">
                </article>
                <input type="submit" value="Actualizar" class="btn btn-info" id="botonEditar">
                <a href="javascript:window.history.back();" class="btn btn-primary">Cancelar</a>
            </section>
    </form>
</article>
@endforeach
@endsection