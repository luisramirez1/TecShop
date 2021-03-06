@extends('principal')

@section('contenido')
    <br>
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Invitado</li>
            </ol>
        </div>
    </div>
    <br>
    <div class="cart-items">
        <div class="container">

            <div class="cart-header wow fadeInUp animated" data-wow-delay=".5s">
                <div class="cart-sec simpleCart_shelfItem">
                    <div class="cart-item cyc">
                            @if($usuarios->imagen == null)
                                <a><img id="imagenUsarios" src="{{asset("images/usuarios/user.png")}}" class="img-responsive" alt=""/></a>
                            @else
                                <a><img id="imagenUsarios" src="{{asset("images/usuarios")}}/{{$usuarios->imagen}}" class="img-responsive" alt=""/></a>
                            @endif
                    </div>
                    <div class="cart-item-info">
                        <h1><span>{{$usuarios->name}}</span></h1> <br>
                        <div>
                            <span id="pM">Información Personal:</span><br>
                            <span>Email :  {{$usuarios->email}}</span><br>
                            <span>Celular :  {{$usuarios->tel}}</span>
                            <div class="clearfix"></div>
                        </div><br>
                        <div>    
                            <span id="pM">Productos Comprados:</span>
                            @if($compraC < 2)
                            <div style="overflow-y: auto; width: 280px; height:40px;">
                                @foreach($compra as $c)
                                    <p>{{$c->name}} ({{$c->cantidad}}):  ${{$c->totalapagar}}</p>                    
                                @endforeach
                            </div>
                            @else
                            <div style="overflow-y: auto; width: 280px; height:100px;">
                                @foreach($compra as $c)
                                    <p>{{$c->name}} ({{$c->cantidad}}):  ${{$c->totalapagar}}</p>                    
                                @endforeach
                            </div>
                            @endif
                        </div><br>
                        <div>
                            <span id="pM">Productos Calificados:</span>
                            <div style="overflow-y: auto; width: 280px; height:100px;">
                                @foreach($usuarioC as $uC)
                                    <p>{{$uC->name}} : 
                                        @if($uC->calificacion == 5)
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        @endif
                                        @if($uC->calificacion == 4)
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star-empty"></span>
                                        @endif
                                        @if($uC->calificacion == 3)
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star-empty"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star-empty"></span>
                                        @endif
                                        @if($uC->calificacion == 2)
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star-empty"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star-empty"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star-empty"></span>
                                        @endif
                                        @if($uC->calificacion == 1)
                                        <span style="color:#F07818" class="glyphicon glyphicon-star"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star-empty"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star-empty"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star-empty"></span>
                                        <span style="color:#F07818" class="glyphicon glyphicon-star-empty"></span>
                                        @endif
                                    </p>                               
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            
        </div>
    </div>
@endsection