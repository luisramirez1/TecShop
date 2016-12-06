@extends('principal')

@section('contenido')
<br>
<div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Registrar Productos</li>
            </ol>
        </div>
    </div>

    <br>
<article id="jum">
    <form action="{{url('/guardarProductos')}}" method="POST" class="jumbotron" id="form1" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
            <section id="seccion1">
                <article class="form-group">
                    <label for="Nombre">Nombre:</label>
                    <input name="name" type="text" class="form-control" placeholder="Nombre" required>
                </article>
                <article class="form-group">
                    <label for="Precio">Precio:</label>
                    <input name="precio" type="tel" class="form-control" placeholder="Precio" required onkeypress="return justNumbers(event);">
                </article>
                <article class="form-group">
                    <label for="Descripcion">Descripcion:</label>
                    <input name="descripcion" type="text" class="form-control" placeholder="Descripcion" required>
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
                <input type="submit" value="Registrar" class="btn btn-info" id="botonEditar">
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModalCsv">Importar Csv</a>
                <a href="{{url('/')}}" class="btn btn-primary">Cancelar</a>
            </section>
    </form>
</article>

<div class="modal fade md" id="myModalCsv" tabindex="-1" role="dialog" aria-labelledby="myModalCsv" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
           <h2>Importar: Productos CSV</h2>  
        </div>
        <div class="modal-body modal-body-sub">
          <div class="row">
            <div class="col-md-12 modal_body_left modal_body_left1">
              <div class="sap_tabs">  
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                  <div class="col-md-12">
                    <form action="{{url('/importar')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <section>
                        <article class="form-group">
                            <label for="Csv">Csv:</label>
                            <input name="csv" type="file" class="form-control" placeholder="Csv" required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        </article>                       
                        <br>
                        <input type="submit" class="btn btn-info btn-sm" value="Importar">
                    </form>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="{{asset("js/main.js")}}"></script>
@endsection