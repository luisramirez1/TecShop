<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset("img/favicon.png")}}" />
	<meta charset="UTF-8">
	<title>TecShop</title>
	<script src="{{asset("js/jquery.js")}}"></script>

  <!--........................................................................................................-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Modern Shoppe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
      function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!--//for-mobile-apps -->
  <!--Custom Theme files -->
  <link href="{{asset("css/bootstrap.css")}}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{asset("css/style.css")}}" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="{{asset("css/flexslider.css")}}" type="text/css" media="screen" />
  <!--//Custom Theme files -->
  <!--js-->
  <script src="{{asset("js/jquery-1.11.1.min.js")}}"></script>
  <script src="{{asset("js/modernizr.custom.js")}}"></script>
  <!--//js-->
  <!--cart-->
  <script src="{{asset("js/simpleCart.min.js")}}"></script>
  <!--cart-->
  <!--web-fonts-->
  <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
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
  <link rel="stylesheet" href="{{asset("css/estilos.css")}}">
  
  <!--........................................................................................................-->
</head>
<body>
  <div class="header">
    <div class="top-header navbar navbar-default"><!--header-one-->
      <div class="container">
        <div class="nav navbar-nav wow fadeInLeft animated" data-wow-delay=".5s">
          @if (Auth::guest())
            <p>Bienvenido a TecShop <a href="{{url('/register')}}">Registrar </a> | <a href="{{url('/login')}}">Ingresar </a></p>
          @else
            <p>Bienvenido a TecShop <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></p>
          @endif
        </div>
        <div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated" data-wow-delay=".5s">
          <ul>
            <li><a href="#"> </a></li>
            <li><a href="#" class="pin"> </a></li>
            <li><a href="#" class="in"> </a></li>
            <li><a href="#" class="be"> </a></li>
            <li><a href="#" class="you"> </a></li>
            <li><a href="#" class="vimeo"> </a></li>
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
    <div class="header-two navbar navbar-default"><!--header-two-->
      <div class="container">
        <div class="nav navbar-nav header-two-left">
          <ul>
            @if (Auth::guest())
              <li></i>Sesion no iniciada</li>
            @else
            @if(Auth::user()->imagen == null)
            <a href="#" data-toggle="modal" data-target="#myModal89"><img id="imagen" src="{{asset("images/usuarios/user.png")}}" alt=""></a> 
            @else
              <a href="#" data-toggle="modal" data-target="#myModal89"><img id="imagen" src="{{asset("images/usuarios")}}/{{Auth::user()->imagen}}" alt=""></a> 
            @endif
              <div id="nombre">
                <li ></i>{{Auth::user()->name}}</li> <br>
            @if(Auth::user()->tipoUsuario == 1)
                <li ><i></i><a>Administrador</a></li> 
            @else
                <li ><i></i><a>Invitado</a></li>
            @endif
              </div>
            @endif     
          </ul>
        </div>
        <div class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".7s">
          <h1><a href="{{url('/')}}">Tec <b>Shop</b><span class="tag">Tecnologia a la Moda</span> </a></h1>
        </div>
        <div class="nav navbar-nav navbar-right header-two-right">
          <div class="header-right my-account">
            <a href=""><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>CONTÁCTANOS</a>       
          </div>
          <div class="header-right cart">
            <a href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
            <h4><a href="checkout.html">
                <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>) 
            </a></h4>
            <div class="cart-box">
              <p><a href="javascript:;" class="simpleCart_empty">Vaciar carrito</a></p>
              <div class="clearfix"> </div>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
    <div class="top-nav navbar navbar-default"><!--header-three-->
      <div class="container">
        <nav class="navbar" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <!--navbar-header-->
<!--............................................................................................... No logueado -->
          @if (Auth::guest())
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav top-nav-info">
              <li><a href="{{url('/')}}" class="active">Inicio</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column multi-column1">
                  <div class="row">
                    <div class="col-sm-4 menu-grids menulist1">
                      <h4>Computadoras</h4>
                      <ul class="multi-column-dropdown ">
                        <li><a class="list" href="">Acer</a></li>
                        <li><a class="list" href="">Apple</a></li>
                        <li><a class="list" href="">Asus</a></li>
                        <li><a class="list" href="">Dell</a></li>
                        <li><a class="list" href="">Gateway</a></li>
                        <li><a class="list" href="">HP</a></li>
                      </ul>
                      <ul class="multi-column-dropdown">
                        <li><a class="list" href="">Lenovo</a></li>
                        <li><a class="list" href="">Sony</a></li>
                        <li><a class="list" href="">Toshiba</a></li>
                        <li><a class="list" href="">Alienware</a></li>
                        <li><a class="list" href="">Compaq</a></li>
                        <li><h6><a class="list" href="">Promociones</a></h6></li>
                      </ul>
                    </div>                                    
                    <div class="col-sm-2 menu-grids">
                      <h4>Smartphone's</h4>
                      <ul class="multi-column-dropdown">
                        <li><a class="list" href="">Apple</a></li>
                        <li><a class="list" href="">Blackberry</a></li>
                        <li><a class="list" href="">HTC</a></li>
                        <li><a class="list" href="">Huawei</a></li>
                        <li><a class="list" href="">Lg</a></li>
                        <li><a class="list" href="">Samsung</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3 menu-grids">
                      <ul class="multi-column-dropdown">
                        <li><a class="list" href="">Sony</a></li>
                        <li><a class="list" href="">Xiaomi</a></li>
                        <h4>Electronica</h4>
                        <li><a class="list" href="">Audio y Video</a></li>
                        <li><a class="list" href="">Impresoras 3D</a></li>
                        <li><a class="list" href="">Smart TV</a></li>
                        <li><a class="list" href="">Accesorios / smartphone</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3 menu-grids">
                      <ul class="multi-column-dropdown">
                        <li><h6><a class="list" href="">Promociones</a></h6></li>
                        <h4>Consolas</h4>
                        <li><a class="list" href="">Play Station 4</a></li>
                        <li><a class="list" href="">Xbox one S</a></li>
                      </ul>
                    </div>
                    <div class="clearfix"> </div>
                  </div>
                </ul>
              </li>

              <li class="dropdown grid">
                <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Ofertas Especiales<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column menu-two multi-column3">
                  <div class="row">
                    <div class="col-sm-4 menu-grids">
                      <ul class="multi-column-dropdown">
                        <li><a class="list" href="">Audio y Video</a></li>
                        <li><a class="list" href="">Computadoras</a></li>
                        <li><a class="list" href="">Consolas</a></li>
                        <li><a class="list" href="">Electronica</a></li>
                        <li><a class="list" href="">Smartphone's</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-8 menu-grids">
                      <a href="">
                        <div class="new-add">
                          <h5>30% OFF <br> Today Only</h5>
                        </div>  
                      </a>
                    </div>  
                    <div class="clearfix"> </div>
                  </div>  
                </ul>
              </li>       
            
<!--............................................................................................... Lo mas popular -->
              <li>
                <a href="">Lo mas popular</a>
              </li>

            </ul> 
            <div class="clearfix"> </div>
            <!--//navbar-collapse-->
            <header class="cd-main-header">
              <ul class="cd-header-buttons">
                <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
              </ul> <!-- cd-header-buttons -->
            </header>
          </div>
          <!--//navbar-header-->
        </nav>
        <div id="cd-search" class="cd-search">
          <form>
            <input type="search" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>
  </div>
          @else
<!--............................................................................................... Administrador -->
          @if(Auth::user()->tipoUsuario == 1)
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav top-nav-info">
              <li><a href="{{url('/')}}" class="active">Inicio</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column multi-column1">
                  <div class="row">
                    <div class="col-sm-4 menu-grids menulist1">
                      <h4>Computadoras</h4>
                      <ul class="multi-column-dropdown ">
                        <li><a class="list" href="">Acer</a></li>
                        <li><a class="list" href="">Apple</a></li>
                        <li><a class="list" href="">Asus</a></li>
                        <li><a class="list" href="">Dell</a></li>
                        <li><a class="list" href="">Gateway</a></li>
                        <li><a class="list" href="">HP</a></li>
                      </ul>
                      <ul class="multi-column-dropdown">
                        <li><a class="list" href="">Lenovo</a></li>
                        <li><a class="list" href="">Sony</a></li>
                        <li><a class="list" href="">Toshiba</a></li>
                        <li><a class="list" href="">Alienware</a></li>
                        <li><a class="list" href="">Compaq</a></li>
                        <li><h6><a class="list" href="">Promociones</a></h6></li>
                      </ul>
                    </div>                                    
                    <div class="col-sm-2 menu-grids">
                      <h4>Smartphone's</h4>
                      <ul class="multi-column-dropdown">
                        <li><a class="list" href="">Apple</a></li>
                        <li><a class="list" href="">Blackberry</a></li>
                        <li><a class="list" href="">HTC</a></li>
                        <li><a class="list" href="">Huawei</a></li>
                        <li><a class="list" href="">Lg</a></li>
                        <li><a class="list" href="">Samsung</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3 menu-grids">
                      <ul class="multi-column-dropdown">
                        <li><a class="list" href="">Sony</a></li>
                        <li><a class="list" href="">Xiaomi</a></li>
                        <h4>Electronica</h4>
                        <li><a class="list" href="">Audio y Video</a></li>
                        <li><a class="list" href="">Impresoras 3D</a></li>
                        <li><a class="list" href="">Smart TV</a></li>
                        <li><a class="list" href="">Accesorios / smartphone</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3 menu-grids">
                      <ul class="multi-column-dropdown">
                        <li><h6><a class="list" href="">Promociones</a></h6></li>
                        <h4>Consolas</h4>
                        <li><a class="list" href="">Play Station 4</a></li>
                        <li><a class="list" href="">Xbox one S</a></li>
                      </ul>
                    </div>
                    <div class="clearfix"> </div>
                  </div>
                </ul>
              </li>

              <li class="dropdown grid">
                <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Ofertas Especiales<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column menu-two multi-column3">
                  <div class="row">
                    <div class="col-sm-4 menu-grids">
                      <ul class="multi-column-dropdown">
                        @foreach($categorias as $c)
                        <li><a class="list" href="">{{$c->name}}</a></li>
                        @endforeach

                        
                      </ul>
                    </div>
                    <div class="col-sm-8 menu-grids">
                      <a href="">
                        <div class="new-add">
                          <h5>30% OFF <br> Today Only</h5>
                        </div>  
                      </a>
                    </div>  
                    <div class="clearfix"> </div>
                  </div>  
                </ul>
              </li>       
            
<!--............................................................................................... Lo mas popular -->
              <li>
                <a href="">Lo mas popular</a>
              </li>
              <li class="dropdown grid">
                <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Registrar<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column menu-two multi-column3">
                  <div class="row">
                    <div class="col-sm-12 menu-grids">
                      <ul class="multi-column-dropdown">
                        <li><a class="list" href="{{url('/registrarProductos')}}">Productos</a></li>
                        <li><a class="list" href="{{url('/registrarCategorias')}}">Categorias</a></li>
                      </ul>
                    </div>
                    <div class="clearfix"> </div>
                  </div>  
                </ul>
              </li>       

            </ul> 
            <div class="clearfix"> </div>
            <!--//navbar-collapse-->
            <header class="cd-main-header">
              <ul class="cd-header-buttons">
                <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
              </ul> <!-- cd-header-buttons -->
            </header>
          </div>
          <!--//navbar-header-->
        </nav>
        <div id="cd-search" class="cd-search">
          <form>
            <input type="search" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>
  </div>
          @else
<!--............................................................................................... Invitado -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav top-nav-info">
              <li><a href="{{url('/')}}" class="active">Inicio</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column multi-column1">
                  <div class="row">
                    <div class="col-sm-4 menu-grids menulist1">
                      <h4>Computadoras</h4>
                      <ul class="multi-column-dropdown ">
                        <li><a class="list" href="">Acer</a></li>
                        <li><a class="list" href="">Apple</a></li>
                        <li><a class="list" href="">Asus</a></li>
                        <li><a class="list" href="">Dell</a></li>
                        <li><a class="list" href="">Gateway</a></li>
                        <li><a class="list" href="">HP</a></li>
                      </ul>
                      <ul class="multi-column-dropdown">
                        <li><a class="list" href="">Lenovo</a></li>
                        <li><a class="list" href="">Sony</a></li>
                        <li><a class="list" href="">Toshiba</a></li>
                        <li><a class="list" href="">Alienware</a></li>
                        <li><a class="list" href="">Compaq</a></li>
                        <li><h6><a class="list" href="">Promociones</a></h6></li>
                      </ul>
                    </div>                                    
                    <div class="col-sm-2 menu-grids">
                      <h4>Smartphone's</h4>
                      <ul class="multi-column-dropdown">
                        <li><a class="list" href="">Apple</a></li>
                        <li><a class="list" href="">Blackberry</a></li>
                        <li><a class="list" href="">HTC</a></li>
                        <li><a class="list" href="">Huawei</a></li>
                        <li><a class="list" href="">Lg</a></li>
                        <li><a class="list" href="">Samsung</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3 menu-grids">
                      <ul class="multi-column-dropdown">
                        <li><a class="list" href="">Sony</a></li>
                        <li><a class="list" href="">Xiaomi</a></li>
                        <h4>Electronica</h4>
                        <li><a class="list" href="">Audio y Video</a></li>
                        <li><a class="list" href="">Impresoras 3D</a></li>
                        <li><a class="list" href="">Smart TV</a></li>
                        <li><a class="list" href="">Accesorios / smartphone</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3 menu-grids">
                      <ul class="multi-column-dropdown">
                        <li><h6><a class="list" href="">Promociones</a></h6></li>
                        <h4>Consolas</h4>
                        <li><a class="list" href="">Play Station 4</a></li>
                        <li><a class="list" href="">Xbox one S</a></li>
                      </ul>
                    </div>
                    <div class="clearfix"> </div>
                  </div>
                </ul>
              </li>

              <li class="dropdown grid">
                <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Ofertas Especiales<b class="caret"></b></a>
                <ul class="dropdown-menu multi-column menu-two multi-column3">
                  <div class="row">
                    <div class="col-sm-4 menu-grids">
                      <ul class="multi-column-dropdown">
                        <li><a class="list" href="">Audio y Video</a></li>
                        <li><a class="list" href="">Computadoras</a></li>
                        <li><a class="list" href="">Consolas</a></li>
                        <li><a class="list" href="">Electronica</a></li>
                        <li><a class="list" href="">Smartphone's</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-8 menu-grids">
                      <a href="">
                        <div class="new-add">
                          <h5>30% OFF <br> Today Only</h5>
                        </div>  
                      </a>
                    </div>  
                    <div class="clearfix"> </div>
                  </div>  
                </ul>
              </li>       
            
<!--............................................................................................... Lo mas popular -->
              <li>
                <a href="">Lo mas popular</a>
              </li>

            </ul> 
            <div class="clearfix"> </div>
            <!--//navbar-collapse-->
            <header class="cd-main-header">
              <ul class="cd-header-buttons">
                <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
              </ul> <!-- cd-header-buttons -->
            </header>
          </div>
          <!--//navbar-header-->
        </nav>
        <div id="cd-search" class="cd-search">
          <form>
            <input type="search" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>
  </div>
  @endif
  @endif
<!--............................................................................................... Yield -->
  <article>
    @yield('contenido')
  </article>

<!--............................................................................................... Footer -->
  <div class="footer">
    <div class="container">
      <div class="footer-info">
        <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".5s">
          <h4 class="footer-logo"><a href="{{url('/')}}">Tec <b>Shop</b> <span class="tag">Tecnologia a la Moda </span> </a></h4>
          <p>© 2016 Tec Shop . All rights reserved</p>
          <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><a>
            Culiacan, Sinaloa.</a><br>
            <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">  tecShop@gmail.com</a><br>
            <i class="glyphicon glyphicon-earphone" aria-hidden="true"></i> +6671234567
        </div>
        <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".7s">
          <h3>Popular</h3>
          <ul>
            <li><a href="">Acerca de</a></li>
            <li><a href="">Contáctanos</a></li>
            <li><a href="">FAQ's</a></li>
           </ul>
        </div>
        <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".9s">
          <h3>Subscribe</h3>
          <p>Regístrese ahora para obtener más información <br> Sobre nuestra compañía </p>
          <form>
            <input type="text" placeholder="Enter Your Email" required="">
            <input type="submit" value="Go">
          </form>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

@if (Auth::guest())
@else
  <div class="modal fade md" id="myModal89" tabindex="-1" role="dialog" aria-labelledby="myModal89"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            &times;</button>
          <h3 class="modal-title" id="nombrem">
            <b>{{ Auth::user()->name }}</b> <br>
          </h3>
        </div>
        <div class="modal-body modal-body-sub">
          <div class="row">
            <div class="col-md-12 modal_body_left modal_body_left1">
              <div class="sap_tabs">  
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                  <div class="col-md-6">
                    <ul>
                      <b>Tipo de Usuario:</b>   @if(Auth::user()->tipoUsuario==1)
                                  Administrador
                                @endif
                                @if(Auth::user()->tipoUsuario==2)
                                  Invitado
                                @endif<br>
                      <b>Correo:</b> {{Auth::user()->email}} <br>
                      <b>Celular:</b> {{Auth::user()->tel}}<br>
                    </ul>
                    <a href="{{url('/editar')}}/{{Auth::user()->id}}" class="btn btn-info btn-sm" id="editar">Editar</a>
                  </div>
                  <div>
                    @if(Auth::user()->imagen == null)
                      <a href="#" data-toggle="modal" data-target="#myModal89"><img id="imagen2" src="{{asset("images/usuarios/user.png")}}" alt=""></a> 
                    @else
                      <a href="#" data-toggle="modal" data-target="#myModal89"><img id="imagen2" src="{{asset("images/usuarios")}}/{{Auth::user()->imagen}}" alt=""></a> 
                    @endif
                  </div>
  @endif

  <!--//footer-->   
  <!--search jQuery-->
  <script src="js/main.js"></script>
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
    <script src="{{asset("js/bootstrap.js")}}"></script>

</body>
</html>