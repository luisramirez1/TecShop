@extends('principal')

@section('contenido')

<div class="login-page">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
            <h3 class="title"><span> Cambiar Contraseña</span></h3>
        </div>

        <div class="widget-shadow">
            <div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
                <h4>Ya tienes cuenta?<a href="{{url('/login')}}">  Ingresar »</a> </h4>
            </div>
            <div class="login-body">
                <form class="wow fadeInUp animated" data-wow-delay=".7s" class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                    {{ csrf_field() }}
                        
                        <input type="hidden" name="token" value="{{ $token }}">

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

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div>
                                <input id="password" type="password" name="password" required placeholder="Contraseña">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <input id="password-confirm" type="password" name="password_confirmation" required placeholder="Confirmar Contraseña">
                            </div>
                        </div>
                    <input type="submit" name="Register" value="Cambiar Contraseña">
                </form>
            </div>
        </div>
    </div>
@endsection
