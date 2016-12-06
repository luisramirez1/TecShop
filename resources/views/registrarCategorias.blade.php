@extends('principal')

@section('contenido')
<br>
<div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Registrar Categorias</li>
            </ol>
        </div>
    </div>

    <br>
<article id="jum">
    <form action="{{url('/guardarCategorias')}}" method="POST" class="jumbotron" id="form1" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
            <section id="seccion1">
                <article class="form-group">
                    <label for="Nombre">Nombre:</label>
                    <input name="name" type="text" class="form-control" placeholder="Nombre" required>
                </article>
                <input type="submit" value="Registrar" class="btn btn-info" id="botonEditar">
                <a href="{{url('/')}}" class="btn btn-primary">Cancelar</a>
            </section>
    </form>
</article>
<script src="{{asset("js/main.js")}}"></script>
@endsection