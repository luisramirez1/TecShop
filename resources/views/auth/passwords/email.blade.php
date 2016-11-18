@extends('principal')

<!-- Main Content -->
@section('contenido')
    <div class="login-page">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
            <h3 class="title"><span> Recupera tu cuenta</span></h3>
        </div>
        @if (session('status'))
            <div class="alert alert-success alert-dismissible" id="alerta" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Listo!</strong> {{ session('status') }}
            </div>   
        @endif

        <div class="widget-shadow">
            <div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
                <h4>Ya tienes cuenta?<a href="{{url('/login')}}">  Ingresar »</a> </h4>
            </div>
            <div class="login-body">
                <form class="wow fadeInUp animated" data-wow-delay=".7s" class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div>
                                <input id="email" class="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <input type="submit" name="Register" value="Recuperar Cuenta">
                </form>
            </div>
        </div> 
    </div>
@endsection

    