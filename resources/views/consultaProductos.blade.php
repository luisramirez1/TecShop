@extends('principal')

@section('contenido')
    <br>
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Productos Registrados</li>
            </ol>
        </div>
    </div>
    <br>
    <div class="products">   
        <div class="container">
                <div class="col-md-11 product-model-sec">
                @foreach($productos as $p)
                    <div>
                    <div class="product-grids simpleCart_shelfItem wow fadeInUp animated" data-wow-delay=".5s">
                        <div class="new-top" id="imgproductos">
                            <a href="{{url('/vistaRapida')}}/{{$p->id}}"><img src="{{asset("images/productos")}}/{{$p->imagen}}" class="img-responsive" alt=""/></a>
                            <div class="new-text">
                                <ul>
                                    <li><a href="{{url('/vistaRapida')}}/{{$p->id}}">Vista Rapida </a></li>
                                    @if (Auth::guest())
                                    @else
                                        <!-- <li><input type="number" class="item_quantity" min="1" value="1"></li> -->
                                        <li><a class="item_add" href="{{url('/editarProductoV')}}/{{$p->id}}"> Editar</a></li>
                                        <li><a class="item_add" href="{{url('/eliminarProducto')}}/{{$p->id}}"> Eliminar</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="new-bottom">
                            <h5><a class="name" href="{{url('/vistaRapida')}}/{{$p->id}}">{{$p->name}}</a></h5>
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