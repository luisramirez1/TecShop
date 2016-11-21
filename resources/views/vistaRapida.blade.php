@extends('principal')

@section('contenido')

<script src="{{asset("js/modernizr.custom.js")}}"></script>
<!--//js-->
<!--flex slider-->
<script defer src="{{asset("js/jquery.flexslider.js")}}"></script>
<link rel="stylesheet" href="{{asset("css/flexslider1.css")}}" type="text/css" media="screen" />
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
<!--flex slider-->
<script src="{{asset("js/imagezoom.js")}}"></script>
<!--cart-->
<!--cart-->
<!--web-fonts-->
<!--web-fonts-->
<!--animation-effect-->
<link href="{{asset("css/animate.min.css")}}" rel="stylesheet"> 
<script src="{{asset("js/wow.min.js")}}"></script>
<script>
 new WOW().init();
</script>
<!--//animation-effect-->
<!--start-smooth-scrolling-->
<script type="text/javascript" src="{{asset("js/move-top.js")}}"></script>
<script type="text/javascript" src="{{asset("js/easing.js")}}"></script> 
<script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){     
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
</script>
<!--//end-smooth-scrolling-->

    <!--breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Vista Rapida</li>
            </ol>
        </div>
    </div>
    <!--//breadcrumbs-->
    <!--single-page-->
    <div class="single">
        <div class="container">
            <div class="single-info">       
                <div class="col-md-6 single-top wow fadeInLeft animated" data-wow-delay=".5s">  
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="{{asset("images/productos")}}/{{$productoVR->imagen}}">
                                <div class="thumb-image"> <img src="{{asset("images/productos")}}/{{$productoVR->imagen}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                            </li>
                            <li data-thumb="{{asset("images/productos")}}/{{$productoVR->imagen2}}">
                                 <div class="thumb-image"> <img src="{{asset("images/productos")}}/{{$productoVR->imagen2}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 single-top-left simpleCart_shelfItem wow fadeInRight animated" data-wow-delay=".5s">
                    <h3>{{$productoVR->name}}</h3>
                    <div class="single-rating">
                        <span class="starRating">
                            <input id="rating5" type="radio" name="rating" value="5" checked>
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3">
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1">
                            <label for="rating1">1</label>
                        </span>
                        <p>5.00 out of 5</p>
                        <a href="#">Agregar Comentario</a>
                    </div>
                    <h6 class="item_price">${{$productoVR->precio}}</h6>         
                    <p>{{$productoVR->descripcion}}</p>
                    <div class="clearfix"> </div>
                    @if (Auth::guest())
                    @else
                        <div class="quantity">
                            <p class="qty"> Cantidad :  </p><input min="1" type="number" value="1" class="item_quantity">
                        </div>
                        <div class="btn_form">
                            <a href="#" class="add-cart item_add">Agregar al Carrito</a>   
                        </div>
                    @endif
                </div>
               <div class="clearfix"> </div>
            </div>
            <!--collapse-tabs-->
            <div class="collpse tabs">
                <div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default wow fadeInUp animated" data-wow-delay=".5s">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Descripción                                
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                    {{$productoVR->descripcion}}
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default wow fadeInUp animated" data-wow-delay=".7s">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Comentarios (5)
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                {{$productoVR->descripcion}}
                            </div>
                        </div>
                    </div>
                </div>
            </div> <br>
            <!--//collapse -->
            
    <!--search jQuery-->
    <script src="{{asset("js/main.js")}}"></script>
    <!--//search jQuery-->
    <!--smooth-scrolling-of-move-up-->
    <script type="{{asset("text/javascript")}}">
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
@endsection