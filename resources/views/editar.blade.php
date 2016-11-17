@extends('principal')

@section('contenido')
<br>
<div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Editar</li>
            </ol>
        </div>
    </div>

    <br>

<article id="jum">
    <form action="{{url('/actualizar')}}/{{$usuarios->id}}" method="POST" class="jumbotron" id="form1" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
            <section id="seccion1">
                <article class="form-group">
                    <label for="Nombre">Nombre:</label>
                    <input name="name" type="text" class="form-control" placeholder="Nombre" required value="{{$usuarios->name}}">
                </article>
                <article class="form-group">
                    <label for="Email">Email:</label>
                    <input name="email" type="email" class="form-control" placeholder="Correo" required value="{{$usuarios->email}}">
                </article>
                <article class="form-group">
                    <label for="Tel">Celular:</label>
                    <input name="tel" type="tel" class="form-control" placeholder="Celular" required onkeypress="return justNumbers(event);" value="{{$usuarios->tel}}">
                </article>
                <article class="form-group">
                    <label for="Password">Contraseña:</label>
                    <input name="password" type="password" class="form-control" placeholder="Contraseña" required>
                </article>            
                <article class="form-group">
                    <label for="Imagen">Imagen:</label>
                    <input name="imagen" type="file" class="form-control" accept="image/*" required>
                </article>
                <input type="submit" value="Editar" class="btn btn-info" id="botonEditar">
                <a href="{{url('/')}}" class="btn btn-primary">Cancelar</a>
            </section>
    </form>
</article>
@endsection