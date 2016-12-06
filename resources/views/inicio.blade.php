@extends('principal')

@section('contenido')
	<!--banner-->
	<div class="banner">
		<div class="container">
			<div class="banner-text">			
				<div class="col-sm-5 banner-left wow fadeInLeft animated" data-wow-delay=".5s">			
					<h2>Tecnologia de gama Alta</h2>
					<h3>Proximamente </h3>
					<h4>Nuevos Productos</h4>
					<div class="count main-row">
						<ul id="example">
							<li><span class="hours">00</span><p class="">Horas</p></li>
							<li><span class="minutes">00</span><p class="">Minutos</p></li>
							<li><span class="seconds">00</span><p class="">Segundos</p></li>
						</ul>
							<div class="clearfix"> </div>
							<script type="text/javascript" src="{{asset("js/jquery.countdown.min.js")}}"></script>
							<script type="text/javascript">
								$('#example').countdown({
									date: '12/24/2020 15:59:59',
									offset: -8,
									day: 'Day',
									days: 'Days'
								}, function () {
									alert('Done!');
								});
							</script>
					</div>

				</div>
				
				<script defer src="{{asset("js/jquery.flexslider.js")}}"></script>
					<script type="text/javascript">
						$(window).load(function(){
						  $('.flexslider').flexslider({
							animation: "pagination",
							start: function(slider){
							  $('body').removeClass('loading');
							}
						  });
						});
					</script> 
					<!--End-slider-script-->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>			
	<!--//banner-->

<!-- for-mobile-apps -->
<!--//for-mobile-apps -->
<!--Custom Theme files -->
<link rel="stylesheet" href="{{asset("css/flexslider.css")}}" type="text/css" media="screen" />
<!--//Custom Theme files -->
<!--js-->
<script src="{{asset("js/modernizr.custom.js")}}"></script>
<!--//js-->
<!--cart-->
<script src="{{asset("js/simpleCart.min.js")}}"></script>
<!--cart-->
<!--web-fonts-->
<!--web-fonts-->
<!--animation-effect-->
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>

	<!--//header-->
	
					<!--FlexSlider-->
					<script defer src="{{asset("js/jquery.flexslider.js")}}"></script>
					<script type="text/javascript">
						$(window).load(function(){
						  $('.flexslider').flexslider({
							animation: "pagination",
							start: function(slider){
							  $('body').removeClass('loading');
							}
						  });
						});
					</script>
					<!--End-slider-script-->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>			
	<!--//banner-->

	<!--trend-->
	<div class="trend wow zoomIn animated" data-wow-delay=".5s">
		<div class="container">
			<div class="trend-info">
				<section class="slider grid">
					<div class="flexslider trend-slider">
						<ul class="slides">
							<li>
								<div class="col-md-5 trend-left">
									<img id="imagenesCarrusel" src="{{asset("images/carrusel/t1.png")}}" alt=""/>
								</div>
								<div class="col-md-7 trend-right">
									<h4>TENDENCIAS <span>PARA TI!</span></h4>
									<h5>20% Descuento</h5>
									<p>El iPhone 6S plus lleva la esencia del iPhone a su máxima expresión. Tiene nuevos y avanzados sistemas de cámara. El mejor rendimiento y la mayor duración de batería en un iPhone. Bocinas estéreo con un sonido envolvente. Una pantalla más brillante y con más colores. Una carcasa resistente a las salpicaduras y al agua.1 Y una potencia enorme en un diseño increíble. Este es el iPhone 6S plus.</p>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="col-md-5 trend-left">
									<img id="imagenesCarrusel2" src="{{asset("images/carrusel/t2.png")}}" alt=""/>
								</div>
								<div class="col-md-7 trend-right">
									<h4>LOS MEJORES <span>PRODUCTOS!</span></h4>
									<h5>A precios Increibles</h5>
									<p>La idea detrás de la iMac nunca estuvo en duda: crear la mejor experiencia en una computadora de escritorio. La mejor pantalla y el mejor procesador, gráficos increíbles y una gran capacidad de almacenamiento, todo dentro de una estructura impecable e increíblemente delgada. El compromiso por hacerla aún mejor continúa con la nueva iMac con pantalla Retina 4K de 21.5 pulgadas, y también con el revolucionario modelo de 27 pulgadas, que brinda una calidad de imagen tan espectacular que te olvidarás de todo lo que pase a tu alrededor. Otro gran paso adelante en la experiencia más fascinante con una iMac.</p>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="col-md-5 trend-left">
									<img id="imagenesCarrusel" src="{{asset("images/carrusel/t3.png")}}" alt=""/>
								</div>
								<div class="col-md-7 trend-right">
									<h4>TENDENCIAS <span>PARA TI!</span></h4>
									<h5>20% Descuento</h5>
									<p>Construye impresionantes e imaginativos mundos con tus amigos. Compite en emocionantes encuentros que requieren reacciones rápidas. Ya sea que busques experiencias cooperativas o competitivas en tu consola, Xbox Live Gold lleva tu juego al siguiente nivel. Por tu cuenta eres poderoso, junto a tus amigos eres Gold.</p>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="col-md-5 trend-left">
									<img id="imagenesCarrusel" src="{{asset("images/carrusel/t4.png")}}" alt=""/>
								</div>
								<div class="col-md-7 trend-right">
									<h4>LOS MEJORES <span>PRODUCTOS!</span></h4>
									<h5>A precios Increibles</h5>
									<p>Además, sus almohadillas extra suaves garantizan un ajuste cómodo, incluso para uso prolongado. Su cable proporciona facilidad de uso, lo que hace que estos auriculares óptimos para utilizarlos en todas partes.Por la combinación de su innovador diseño y la excelente calidad de sonido hacen de estos audífonos in ear MX 686G de Sennheiser tu compañero perfecto durante tus rutinas de ejercicio, tu trayecto en el transporte público o simplemente en tus ratos libres.</p>
								</div>
								<div class="clearfix"></div>
							</li>
						</ul>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!--//trend-->
	 
	<div class="gallery">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title">Productos<span> Populares</span></h3>
			</div>
			<div class="alert alert-danger alert-dismissible" id="alertaVC" role="alert" style="display: none; width: 50%; margin: 0 auto;">
        		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<strong>Espera!</strong> Necesitas <a href="{{url('login')}}">INICIAR SESION</a> para ver el carrito.
    		</div><br>
			<div class="gallery-info">
				@foreach($populares as $p)

				<div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">

					<a href="{{url('/vistaRapida')}}/{{$p->id}}/{{$p->categoria}}"><img src="{{asset("images/productos/$p->imagen")}}" class="img-responsive" alt=""/></a>
					<div class="gallery-text simpleCart_shelfItem">
						<h5><a class="name" href="{{url('/vistaRapida')}}/{{$p->id}}/{{$p->categoria}}">{{$p->name}}</a></h5>
						<p><span class="item_price">${{$p->precio}}</span></p>
						<ul>
							@if(Auth::guest())
								<li><a class="item_add" onclick="alertaVC()" style="cursor: pointer; cursor: hand;"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
							@else
								<li><a class="item_add" href="{{url('/carrito')}}/{{Auth::user()->id}}"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
							@endif
						</ul>
					</div>

				</div>
				@endforeach
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<script>
        function alertaVC() {
            $("#alertaVC").fadeTo(8000, 1000).slideUp(1000, function(){
            $("#alertaVC").slideUp(1000);
        	});
        }
    </script>
	<!--search jQuery-->
	<script src="{{asset("js/main.js")}}"></script>
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
		$(document).ready(function() {
		
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->

@stop
