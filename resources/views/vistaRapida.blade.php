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
                   <!--  <div class="alert alert-danger alert-dismissible" id="alertaC" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Espera!</strong> Ya calificaste este producto.
                    </div> -->
                    <!-- Alerta cuando calificaste el producto -->
                    <div class="alert alert-success alert-dismissible" id="alertaSi" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Espera!</strong> Estamos procesando tu calificacion. Gracias por calificar: {{$productoVR->name}}.
                    </div>
                    <!-- Alerta cuando no has iniciado sesion -->
                    <div class="alert alert-danger alert-dismissible" id="alertaL" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Espera!</strong> Necesitas <a href="{{url('login')}}">INICIAR SESION</a> para calificar este producto: {{$productoVR->name}}.
                    </div>
                    <div class="alert alert-danger alert-dismissible" id="alertaVacio" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Espera!</strong> Por el momento no tenemos en existencia este producto: {{$productoVR->name}}.
                    </div> 
                    <h3>{{$productoVR->name}}</h3>
                    @if (Auth::guest())
                    <div class="single-rating">
                        <span class="starRating">
                            <input id="rating5" type="radio" name="" value="" onclick="alertaL()">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="" value="" onclick="alertaL()">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="" value="" onclick="alertaL()">
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="" value="" onclick="alertaL()">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="" value="" onclick="alertaL()">
                            <label for="rating1">1</label>
                        </span>
                    </div>
                    @else

                    <form id="myForm" action="{{url('/calificacion')}}/{{$productoVR->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="single-rating">
                        <span class="starRating">
                            <input id="rating5" type="radio" name="rating" value="5" onclick="submitt()">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4" onclick="submitt()">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3" onclick="submitt()">
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2" onclick="submitt()">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1" onclick="submitt()">
                            <label for="rating1">1</label>
                        </span>
                        @if (Auth::guest())
                        @else
                            <a href="#" data-toggle="modal" data-target="#myModalC">Agregar Comentario</a>
                        @endif
                    </div>
                    </form>
                    @endif
                    
                    <script>
                        function submitt() {
                        $("#alertaSi").fadeTo(4000, 1000).slideUp(1000, function(){
                            $("#alertaSi").slideUp(1000);
                            document.getElementById("myForm").submit();
                            });
                        }
                        function alertaL() {
                            $("#alertaL").fadeTo(8000, 1000).slideUp(1000, function(){
                            $("#alertaL").slideUp(1000);
                            });
                        }

                    </script>
                            <h6 class="item_price">${{$productoVR->precio}}</h6>         
                            <p>{{$productoVR->descripcion}}</p>

                    @if (Auth::guest())
                    @else
                        <div class="clearfix"> </div>
                        <form id="myForm2" action="{{url('/agregarCarrito')}}/{{$productoVR->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="quantity">
                                <p class="qty"> Existencia :  </p><input min="1" type="number" name="cantidad" value="{{$productoVR->existencia}}" class="item_quantity" disabled=""> <br>
                                <p class="qty"> Cantidad :  </p><input min="1" max="{{$productoVR->existencia}}" type="number" name="cantidad" value="1" class="item_quantity">
                            </div>
                            <div class="btn_form">
                            @if($productoVR->existencia == 0)
                                <a id="carritoB" class="add-cart item_add" onclick="alertaVacio()">Agregar al Carrito</a>
                            @else
                                <a id="carritoB" class="add-cart item_add" onclick="submitt2()">Agregar al Carrito</a>
                            @endif 
                            </div>
                        </form>
                    @endif
            
                </div>
               <div class="clearfix"> </div>
            </div>

                    <script>
                        function submitt2() {
                            document.getElementById("myForm2").submit();
                        }
                        function alertaVacio() {
                            $("#alertaVacio").fadeTo(8000, 1000).slideUp(1000, function(){
                            $("#alertaVacio").slideUp(1000);
                            });
                        }
                    </script>
            <!--collapse-tabs-->
            
            <!--//collapse -->
@if (Auth::guest())
    <div class="collpse tabs">
                <div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default wow fadeInUp animated" data-wow-delay=".5s">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Descripcion
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
                                    Comentarios ({{$comentario}})
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                @foreach($usuarioC as $u)
                                <section class="row">
                                    <article class="col-xs-9" id="nombreC">
                                        <strong><h2>{{$u->name}}</h2></strong>
                                    </article>
                                    <article class="col-xs-4">
                                        @if($u->imagen == null)
                                            <img id="imagenC" src="{{asset("images/usuarios/user.png")}}" alt="">
                                        @else
                                            <img id="imagenC" src="{{asset("images/usuarios")}}/{{$u->imagen}}" alt="">
                                        @endif      
                                    </article>
                                    <article class="col-xs-6" id="comentarioU">
                                        <h3><em>"{{$u->comentario}}"</em></h3> 
                                    </article>
                                    <article>
                                        {{$u->created_at}}
                                    </article>
                                </section>
                                @if($comentario > 1)
                                    <hr>
                                @endif
                                @endforeach
                                <br>
                            </div>
                        </div>
                    </div> <br>
                </div>
            </div>
        </div>
    </div>
@else
@if(Auth::user()->tipoUsuario == 1)
<div class="collpse tabs">
                <div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default wow fadeInUp animated" data-wow-delay=".5s">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Descripcion
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
                                    Comentarios ({{$comentario}})
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                @foreach($usuarioC as $u)
                                <section class="row">
                                    <article class="col-xs-9" id="nombreC">
                                        <strong><h2>{{$u->name}}</h2></strong>
                                    </article>
                                    <article class="col-xs-4">
                                        @if($u->imagen == null)
                                            <img id="imagenC" src="{{asset("images/usuarios/user.png")}}" alt="">
                                        @else
                                            <img id="imagenC" src="{{asset("images/usuarios")}}/{{$u->imagen}}" alt="">
                                        @endif    
                                    </article>
                                    <article class="col-xs-6" id="comentarioU">
                                        <h3><em>"{{$u->comentario}}"</em></h3> 
                                    </article>
                                    <article>
                                        {{$u->created_at}}
                                    </article> <br>
                                    <article>
                                        <a href="{{url('/editarComentarioV')}}/{{$u->id}}" class="btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        <a href="{{url('/eliminarComentario')}}/{{$u->id}}" class="btn-danger btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                    </article>
                                </section>
                                @if($comentario > 1)
                                    <hr>
                                @endif
                                @endforeach
                                <br>
                            </div>
                        </div>
                    </div> <br>
                </div>
            </div>
        </div>
    </div>
@else
<div class="collpse tabs">
                <div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default wow fadeInUp animated" data-wow-delay=".5s">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Descripcion
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
                                    Comentarios ({{$comentario}})
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                @foreach($usuarioC as $u)
                                <section class="row">
                                    <article class="col-xs-9" id="nombreC">
                                        <strong><h2>{{$u->name}}</h2></strong>
                                    </article>
                                    <article class="col-xs-4">
                                        @if($u->imagen == null)
                                        <img id="imagenC" src="{{asset("images/usuarios/user.png")}}" alt="">
                                        @else
                                        <img id="imagenC" src="{{asset("images/usuarios")}}/{{$u->imagen}}" alt="">
                                        @endif   
                                    </article>
                                    <article class="col-xs-6" id="comentarioU">
                                        <h3><em>"{{$u->comentario}}"</em></h3> 
                                    </article>
                                    <article>
                                        {{$u->created_at}}
                                    </article>
                                </section>
                                @if($comentario > 1)
                                    <hr>
                                @endif
                                @endforeach
                                <br>
                            </div>
                        </div>
                    </div> <br>
                </div>
            </div>
        </div>
    </div>
@endif
@endif
    <div class="modal fade md" id="myModalC" tabindex="-1" role="dialog" aria-labelledby="myModalC" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
           <h2>Comentar: {{$productoVR->name}}</h2>  
        </div>
        <div class="modal-body modal-body-sub">
          <div class="row">
            <div class="col-md-12 modal_body_left modal_body_left1">
              <div class="sap_tabs">  
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                  <div class="col-md-12">
                    @if (Auth::guest())
                    @else
                    <form action="{{url('/comentar')}}/{{Auth::user()->id}}/{{$productoVR->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <section>
                        <article class="form-group">
                            <label for="Comentario">Comentario:</label>
                            <input name="comentario" type="text" class="form-control" placeholder="Comentario" required>
                        </article>                       
                        <br>
                        <input type="submit" class="btn btn-info btn-sm" value="Comentar">
                    </form>
                    @endif
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
    <div class="single">
        <div class="container">
            <div class="related-products">
                <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
                    <h3 class="title">Productos<span> Relacionados</span></h3>
                </div>
                <div class="related-products-info">
                    
                @foreach($relacionados as $r)

                    <div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay=".5s">
                        <div class="new-top">
                            <a href="{{url('/vistaRapida')}}/{{$r->id}}/{{$r->categoria}}"><img src="{{asset("images/productos")}}/{{$r->imagen}}" class="img-responsive" alt=""/></a>
                            <div class="new-text">
                                <ul>
                                    <li><a href="{{url('/vistaRapida')}}/{{$r->id}}/{{$r->categoria}}">Vista Rapida </a></li>
                                    @if (Auth::guest())
                                    @else
                                        <li><input type="number" class="item_quantity" min="1" value="1"></li>
                                        <li><a class="item_add" href=""> Agregar al carro</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="new-bottom">
                            <h5><a class="name" href="{{url('/vistaRapida')}}/{{$r->id}}/{{$r->categoria}}">{{$r->name}}</a></h5>
                            <div class="rating">
                                <span class="on">☆</span>
                                <span class="on">☆</span>
                                <span class="on">☆</span>
                                <span class="on">☆</span>
                                <span>☆</span>
                            </div>  
                            <div class="ofr">
                                <p class="pric1"><del>${{$r->precio + 500}}</del></p>
                                <p><span class="item_price">${{$r->precio}}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
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