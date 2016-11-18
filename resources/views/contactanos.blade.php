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
            <p>.- Por favor, contacta con nuestro soporte técnico
            -> support@tecshop.com</p>
            <br>
            <strong>Preguntas sobre la privacidad</strong>
            <p>.- Si tienes preguntas sobre nuestra Política de privacidad, por favor contactanos.</p>
            <br>
            <strong>Consultas empresariales</strong>
            <p>Por favor, contacta con nuestro equipo de negocios
            -> bd@tecshop.com</p>
            <strong>Dirección corporativa</strong>
            <p>TecShop Inc.</p>
            <p>#1234 Desarrollo Urbano 3 Rios
            Culiacan, Sinaloa México.</p>
    </div>
@stop
