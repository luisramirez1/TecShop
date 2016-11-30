@extends('principal')

@section('contenido')
    <br>
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Usuarios Invitados</li>
            </ol>
        </div>
    </div>
    <br>
    <div class="products">   
        <div class="container">
            <div class="col-md-11 product-model-sec">
                @foreach($usuarios as $u)
                    <div>
                        <div class="product-grids simpleCart_shelfItem wow fadeInUp animated" data-wow-delay=".5s">
                            <div class="new-top" >
                                @if($u->imagen == null)
                                    <img id="imagenUsarios" src="{{asset("images/usuarios/user.png")}}" alt="">
                                @else
                                    <img id="imagenUsarios" class="img-responsive" src="{{asset("images/usuarios")}}/{{$u->imagen}}"  alt=""/>
                                @endif                          
                            </div>
                            <div class="new-bottom">
                            @if($u->verifiedLogin == false)
                                <h5><a class="name" href="{{url('/vistaRapida')}}/{{$u->id}}">{{$u->name}}</a></h5>
                                 <span style="background: rgb(165, 165, 165); border-radius: 50%; display: inline-block; height: 12px; margin-left: 4px; width: 12px;">
                                </span>
                            @else
                                <h5><a class="name" href="{{url('/vistaRapida')}}/{{$u->id}}">{{$u->name}}</a></h5>
                                 <span style="background: rgb(66, 183, 42); border-radius: 50%; display: inline-block; height: 12px; margin-left: 4px; width: 12px;">
                                </span>
                            @endif
                                <div class="ofr">
                                    {{$u->email}}<br>
                                    <span class="item_price">{{$u->tel}}</span><br>
                                    <br>
                                    <div id="botones">
                                        <a href="{{url('/eliminarUsuarios')}}/{{$u->id}}" class="btn-danger btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="clearfix"> </div>
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