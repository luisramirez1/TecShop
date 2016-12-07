@extends('principal')

@section('contenido')
    <br>
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Carrito</li>
            </ol>
        </div>
    </div>
    <br>
   
    @include('partials.exito2') <br>

    <div class="cart-items">
		<div class="container">
			<h3 class="wow fadeInUp animated" data-wow-delay=".5s">Mi Carrito ({{$cantidad}}) <span id="monto"><em>Monto: ${{$cantidadPagar}}</em></span></h3>

			@foreach($carrito as $c)
			<div class="cart-header wow fadeInUp animated" data-wow-delay=".5s">
				<a href="{{url('/eliminarCarri')}}/{{$c->id}}"><div class="alert-close"></div></a>
				<div class="cart-sec simpleCart_shelfItem">
					<div class="cart-item cyc">
						<a href="{{url('/vistaRapida')}}/{{$c->id_pro}}/{{$c->categoria}}"><img src="{{asset("images/productos/$c->imagen")}}" class="img-responsive" alt=""></a>
					</div>
					<div class="cart-item-info">
						<h4><a href="{{url('/vistaRapida')}}/{{$c->id_pro}}/{{$c->categoria}}"> {{$c->name}} </a><span>Fecha y Hora del pedido: {{$c->created_at}}</span></h4>
						<ul class="qty">
							<li><p>Cantidad : {{$c->cantidad}}</p></li>
							<li><p>Envio GRATIS!</p></li>
						</ul>
						<div class="delivery">
							<p>Monto a Pagar : ${{$c->totalapagar}}</p>
							<span>Entrega de 1-6 dias</span>
							<div class="clearfix"></div>
						</div>	
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			@endforeach
			@if($cantidad == 0)
			@else
				<h3 class="wow fadeInUp animated" data-wow-delay=".5s" style="text-align: center;">
					<a href="{{url('/comprar')}}/{{Auth::user()->id}}" class="btn btn-info" style="font-size: 21px; font-weight: bold;">Finalizar Compra</a>
				</h3>
			@endif
		</div>
	</div>                      
@endsection