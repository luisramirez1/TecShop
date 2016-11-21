@extends('principal')

@section('contenido')
    <div class="breadcrumbs">
         <div class="container">
             <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                 <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                 <li class="active">Acerca de</li>
             </ol>
        </div>
    </div>
    <div class="jumbotron" id="jum2">
        <section id="seccion1">
        <h2><strong>; Acerca de Tecshop</strong></h2>
            <br>
            <strong>Nuestra Pagina</strong>
            <h3><p>.- Muchas personas en el pais utilizan TecShop para mantenerse en contacto con las nuevas
            tecnologias.</p></h3>
            
            <strong>Nuestra Misión</strong>
            <h3><p>.- TecShop comenzó como una nueva alternativa para la compra de aparatos tecnologicos. nuestros productos ahora son de la mas alta calidad en el mercado internacional.</p></h3>
            
            <h3><strong>Nuestro Equipo</strong>
            <p>.- TecShop es una empresa fundada por Luis Ramirez y Mario Sanz, quienes trabajaron en conjunto para el desarrollo de la pagina, enfocada a ser un servicio rapido y confiable en cualquier parte.</p></h3>
        </section>
    </div>
@stop
