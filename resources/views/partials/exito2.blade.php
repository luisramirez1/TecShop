@if(session('status'))
	<div class="alert alert-success alert-dismissible" id="alertaSi" role="alert" style="width: 50%; margin: 0 auto;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Genial!</strong> {{ session('status')}}
    </div>

    <script>
    	$("#alertaSi").fadeTo(6000, 1000).slideUp(1000, function(){
            $("#alertaSi").slideUp(1000);
            });
    </script>
@endif
