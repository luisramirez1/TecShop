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
                    @if (Auth::guest())
                    <div class="single-rating">
                        <span class="starRating2">
                            <input id="rating5" type="radio" name="" value="">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="" value="">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="" value="">
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="" value="">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="" value="">
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
                            <p>5.00 out of 5</p>
                            <a href="#" data-toggle="modal" data-target="#myModalC">Agregar Comentario</a>
                        @endif
                    </div>
                    </form>
                    @endif
                    
                    <script>
                        function submitt() {
                        document.getElementById("myForm").submit();
                        }
                    </script>
                            <h6 class="item_price">${{$productoVR->precio}}</h6>         
                            <p>{{$productoVR->descripcion}}</p>

                    @if (Auth::guest())
                    @else
                        <div class="clearfix"> </div>
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
                                        <img id="imagenC" src="{{asset("images/usuarios")}}/{{$u->imagen}}" alt="">   
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
                                        <img id="imagenC" src="{{asset("images/usuarios")}}/{{$u->imagen}}" alt="">   
                                    </article>
                                    <article class="col-xs-6" id="comentarioU">
                                        <h3><em>"{{$u->comentario}}"</em></h3> 
                                    </article>
                                    <article>
                                        {{$u->created_at}}
                                    </article> <br>
                                    <article>
                                        <a href="{{url('/editarComentarioV')}}/{{$u->id_comentario}}" class="btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        <a href="{{url('/eliminarComentario')}}/{{$u->id_comentario}}" class="btn-danger btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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
                                        <img id="imagenC" src="{{asset("images/usuarios")}}/{{$u->imagen}}" alt="">   
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