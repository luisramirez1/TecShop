@extends('principal')

@section('contenido')
    <br>
    <div class="breadcrumbs">
         <div class="container">
             <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                 <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                 <li class="active">Registrar Marcas</li>
             </ol>
        </div>
    </div>
    <br>
    <article id="jum">
        <form action="{{url('/guardarMarcas')}}" method="POST" class="jumbotron" id="form1" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
                <section id="seccion1">
                    <article class="form-group">
                        <label for="Nombre">Nombre:</label>
                        <input name="name" type="text" class="form-control" placeholder="Nombre" required>
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
                    <input type="submit" value="Registrar" class="btn btn-info" id="botonEditar">
                    <a href="{{url('/')}}" class="btn btn-primary">Cancelar</a>
                </section>
        </form>
    </article>
    <script src="{{asset("js/main.js")}}"></script>
@endsection