@if(session('status'))
	<div class="alert alert-success alert-dismissible" id="alerta" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Espera!</strong> {{ session('status')}}
    </div>
@endif
