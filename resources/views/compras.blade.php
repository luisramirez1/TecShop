@extends('principal')

@section('contenido')
    <br>
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Compras</li>
                <li><a href="{{url('/generarPDFCompras')}}/{{Auth::user()->id}}/{{$canti}}" id="exportar" target="_blank"><span class="glyphicon glyphicon-download-alt" aria-hidden="true" id="exportar"></span >Generar PDF</a></li>
            </ol>
        </div>
    </div>
    <br>
    <div class="cart-items">
		<div class="container">
			<h3 class="wow fadeInUp animated" data-wow-delay=".5s">Compra#: {{$canti}} <span id="monto"><em>Total: ${{$cantidadT}}.00</em></span></h3>

			@foreach($compra as $c)
			<div class="cart-header wow fadeInUp animated" data-wow-delay=".5s">
				<div class="cart-sec simpleCart_shelfItem">
					<div class="cart-item cyc">
						<a><img src="{{asset("images/productos/$c->imagen")}}" class="img-responsive" alt=""></a>
					</div>
					<div class="cart-item-info">
						<h4><a> {{$c->name}} </a><span>Fecha y Hora del pedido: {{$c->created_at}}</span></h4>
						<ul class="qty">
							<li><p>Cantidad : {{$c->cantidad}}</p></li>
							<li><p>Envio GRATIS!</p></li>
						</ul>
						<div class="delivery">
							<p>Monto Pagado : ${{$c->totalapagar}}</p>
							<span>Entrega de 1-6 dias</span>
							<div class="clearfix"></div>
						</div>	
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<script src="{{asset("js/main.js")}}"></script>
@endsection