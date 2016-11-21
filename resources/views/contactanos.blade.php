@extends('principal')

@section('contenido')
    <div class="breadcrumbs">
         <div class="container">
             <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                 <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                 <li class="active">Contactanos</li>
             </ol>
        </div>
    </div>
    <div class="jumbotron" id="jum">

        <strong>Soporte técnico</strong>
            <h3><p>.- Por favor, contacta con nuestro soporte técnico: <a>support@tecshop.com</a></p></h3>
            
        <strong>Preguntas sobre la privacidad</strong>
            <h3><p>.- Si tienes preguntas sobre nuestra Política de privacidad, por favor contáctanos.</p></h3>
            
        <strong>Consultas empresariales</strong>
            <h3><p>.- Por favor, contacta con nuestro equipo de negocios: <a>bd@tecshop.com</a></p></h3>
        <strong>Dirección corporativa</strong>
            <h3><p>TecShop Inc.<br>
            Culiacan, Sinaloa México.</p></h3>
    </div>
@stop
