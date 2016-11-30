@extends('principal')

@section('contenido')
<br>
<div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Editar Producto</li>
            </ol>
        </div>
    </div>
    <br>

<article id="jum">
    <form action="{{url('/editarProducto')}}/{{$producto->id}}" method="POST" class="jumbotron" id="form1" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
             <section id="seccion1">
                <article class="form-group">
                    <label for="Nombre">Nombre:</label>
                    <input name="name" type="text" class="form-control" placeholder="Nombre" required value="{{$producto->name}}">
                </article>
                <article class="form-group">
                    <label for="Precio">Precio:</label>
                    <input name="precio" type="tel" class="form-control" placeholder="Precio" required onkeypress="return justNumbers(event);" value="{{$producto->precio}}">
                </article>
                <article class="form-group">
                    <label for="Descripcion">Descripcion:</label>
                    <input name="descripcion" type="text" class="form-control" placeholder="Descripcion" required value="{{$producto->descripcion}}">
                </article>
                <article class="form-group">
                    <label for="Categoria">Categoria:</label>
                    <select name="categoria" class="form-control" required>
                        <option value="">Categoria</option>
                        @foreach($categorias as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </article>
                <article class="form-group">
                    <label for="Marca">Marca:</label>
                    <select name="marca" class="form-control" required>
                        <option value="">Marca</option>
                        @foreach($marca as $m)
                            <option value="{{$m->id}}">{{$m->name}}</option>
                        @endforeach
                    </select>
                </article>                   
                <article class="form-group">
                    <label for="Imagen">Imagen:</label>
                    <input name="imagen" type="file" class="form-control" accept="image/*" required>
                </article>
                <article class="form-group">
                    <label for="Imagen2">Imagen 2:</label>
                    <input name="imagen2" type="file" class="form-control" accept="image/*" required>
                </article>
                <input type="submit" value="Actualizar" class="btn btn-info" id="botonEditar">
                <a href="javascript:window.history.back();" class="btn btn-primary">Cancelar</a>
            </section>
    </form>
</article>

@endsection