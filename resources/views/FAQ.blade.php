@extends('principal')

@section('contenido')
   <div class="breadcrumbs">
         <div class="container">
             <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                 <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                 <li class="active">Preguntas Frecuentes</li>
             </ol>
        </div>
    </div>
    <div class="jumbotron" id="jum">
        <strong>¿Que es TecShop?</strong>
            <h3><p>.- Somos una tienda virtual, es un negocio electronico que basicamente se encarga de publicar productos de diferentes proveedores para que dichos proveedores puedan llamar la atencion de usuarios registrados.</p></h3>
            
        <strong>¿Requisitos para vender en TecShop?</strong>
            <h3><p>.- Cualquier vendedor internacional puede registrarse para vender en TecShop a través de la plataforma. Sin embargo, nosotros colocamos ciertos límites en nuevas cuentas, y nuestras herramientas y sistemas actuales están dirigidos a los vendedores de mayor volumen en comparación con los individuos.</p></h3>
            
        <strong>¿Que paises son compatibles?</strong>
            <h3><p>.- El programa está abierto a los vendedores en todo el mundo.</p></h3>
            
        <strong>¿Como puedo vender mas en TecShop?</strong>
            <h3><p>Hay varias cosas que puede hacer para mejorar sus ventas en TecShop. Estas son algunas de las estrategias que han funcionado para algunos de nuestros vendedores:</p>

            <p>.- Incluir la información clave acerca de sus productos en los campos apropiados, tales como el tipo de producto, marca, modelo, y la UPC / EAN. Estos campos se utilizan en las campañas de marketing locales y pueden ayudar a aumentar la exposición de sus artículos en una búsqueda local.</p>

            <p>.- Encontrar el método óptimo para el envío / venta.</p>

            <p>.- Responder a las preguntas de pre-venta rápido: Culturalmente, los compradores latinoamericanos gusta hacer preguntas antes de comprar. vendedores exitosos locales a responder a las preguntas en cuestión de minutos.
            Cuanto más rápido se puede responder a las preguntas, mayor será la probabilidad de conversión. </p></h3>
    </div>
@stop
