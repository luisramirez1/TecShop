@extends('principal')

@section('contenido')
<br>
<div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Categorias</li>
            </ol>
        </div>
    </div>

    <br>
    
    <div class="products">   
        <div class="container">
                <div class="col-md-9 product-model-sec">
                @foreach($productoss as $p)
                    <div>
                    <div class="product-grids simpleCart_shelfItem wow fadeInUp animated" data-wow-delay=".5s">
                        <div class="new-top" id="imgproductos">
                            <a href="{{url('/vistaRapida')}}/{{$p->id}}/{{$p->categoria}}"><img src="{{asset("images/productos")}}/{{$p->imagen}}" class="img-responsive" alt=""/></a>
                                                         
                            <div class="new-text">
                                <ul>
                                    <li><a href="{{url('/vistaRapida')}}/{{$p->id}}/{{$p->categoria}}">Vista Rapida </a></li>
                                    @if (Auth::guest())
                                    @else
                                        <li><a>Existencia: {{$p->existencia}} </a></li>
                                        <li><a href="{{url('/carrito')}}/{{Auth::user()->id}}" id="carritoB" class="add-cart item_add">Ir al Carrito</a></li>
                                    @endif
                                </ul>
                            </div>
                               
                        </div>
                        <div class="new-bottom">
                            <h5><a class="name" href="{{url('/vistaRapida')}}/{{$p->id}}/{{$p->categoria}}">{{$p->name}}</a></h5>
                            <div class="rating">
                                <span class="on">☆</span>
                                <span class="on">☆</span>
                                <span class="on">☆</span>
                                <span class="on">☆</span>
                                <span class="on">☆</span>
                            </div>
                            <div class="ofr">
                                <p class="pric1"><del>${{$p->precio + 500}}</del></p>
                                <p><span class="item_price">${{$p->precio}}</span></p>
                            </div>
                        </div>
                    </div>
                    </div>
                @endforeach
                    <script>
                        function submitt3() {
                            document.getElementById("myForm3").submit();
                        }
                        function alertaVacio() {
                            $("#alertaVacio").fadeTo(8000, 1000).slideUp(1000, function(){
                            $("#alertaVacio").slideUp(1000);
                            });
                        }
                    </script>
            </div>
            <div class="col-md-3 rsidebar">
                <div class="rsidebar-top">
                    <div class="sidebar-row">
                        <h4>Marcas</h4>
                        <div class="row row1 scroll-pane">
                            @foreach($marcas as $m)
                                <label class="subitem1"><a href="{{url('/marcas')}}/{{$m->id}}">{{$m->name}}</a></label> <br>
                            @endforeach
                        </div>
                    </div>  
                </div>
                <div class="gallery-grid ">
                    <h6>Te puede interesar!</h6>
                    @foreach($interesar as $i)
                    <a href="{{url('/vistaRapida')}}/{{$i->id}}/{{$i->categoria}}"><img id="interesar" src="{{asset("images/productos")}}/{{$i->imagen}}" class="img-responsive" alt=""/></a>
                    <div class="gallery-text simpleCart_shelfItem">
                        <h5><a class="name" href="{{url('/vistaRapida')}}/{{$i->id}}/{{$i->categoria}}">{{$i->name}}</a></h5>
                        <p><span class="item_price">${{$i->precio}}</span></p> <br>
                        <ul>
                            <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
                            <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
                            <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset("js/jquery.jscrollpane.min.js")}}"></script>
            <script type="text/javascript" id="sourcecode">
                $(function()
                {
                    $('.scroll-pane').jScrollPane();
                });
            </script>
    <!-- //the jScrollPane script -->
    <script type="text/javascript" src="{{asset("js/jquery.mousewheel.js")}}"></script>
    <!-- the mousewheel plugin -->
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

@endsection