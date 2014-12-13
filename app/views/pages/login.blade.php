<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="box">
				<div class="box-content">
					<div class="text-center">
						<h3 class="page-header">OpenPublish Login Page</h3>
						<div class="has-error has-feedback">
				         
		                </div>
					</div>	 

						

			            <div class="form-group">
			            <label>Email:</label>
			            <input id="email" name="email" type="text" class="form-control" placeholder="email" data-toggle="tooltip" data-placement="bottom" title="Email de usuario">
			                
				            <div class="has-error has-feedback">
					            <center><label id="_email" class="control-label"><center>{{$errors->first('email')}}</center></label></center>
			                </div>
			            </div> 
			            
			            <div class="form-group">
			            	<label>Clave:</label>
				            <input id="clave" name="clave" type="password" class="form-control" placeholder="P@ssw0rd" data-toggle="tooltip" data-placement="bottom" title="Clave de usuario">
			                <div class="has-error has-feedback">
					            <center><label id="_clave" class="control-label"><center>{{$errors->first('password')}}</center></label></center>
			                </div>
			            </div>
			            
			            <div class="form-group">
			                <label>Recordar sesión:</label>
			                <input id="recordars" checked="checked" name="remember" type="checkbox" value="On">
			            </div>
			            
			            <div class="form-group">
			            	<input id="token" name="_token" type="hidden" value="{{csrf_token()}}">
			                <input id="enviar" class="btn btn-primary" type="button" value="Iniciar sesión">
			                <div id='before'></div>
			            </div>	

			            


				</div>

			</div>
	    </div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>


<script>
	$(document).on('click', '#enviar',function (e) {
	    e.preventDefault();

	    var a = false;
	    if( $('#recordars').is(':checked') ) 
		    {
			    a = true;
			}

	    $.ajax({
	    	
	    	url: "{{URL::route('makelogin')}}",
	    	type: 'POST',
	    	
	    	data: {email: $("#email").val() , clave: $("#clave").val() , remenber: a , token: $("#token").val()  },
	    	beforeSend: function(){
	    			
                    $('#before').append('<label>loading...</label>');
                },
	    })
	    .done(function(data) {
	    	// console.log(data.success);
	    	if(data.success == false){

									   $.each(data.errors ,function(index,value)
									   {
									   		$('#_'+index).text(value);
									   		
									   });
									   $('#before').html("");
									   // console.log(data.message);
									}
			if(data.success == true){

									   $('#before').html("");
									   // console.log(data.message);
									   jQuery(location).attr('href', "http://localhost/OpenPublish/public/"+data.message);

									   
									}
			if(data.success == "falselog"){
										$.each(data.errors ,function(index,value)
									   {
									   		$('#_'+index).text(value);
									   		
									   });

									   $('#before').html(" "+data.message+" ");
									   // console.log(data.message);  
									}
	    })
	    .fail(function(data) {
	    	console.log(data.success);
	    	console.log(data.message);
	    })

    });
</script>