<?php

class AuthController extends BaseController {


	public function makeLogin()
	{
		if(Request::ajax())
		{
			$rules = array(
				            'email'         => 'required|email|between:3,80',
				            'clave'         => 'required|between:8,20',
        				  );
			$infomesaje=array(



			                'email.required' => 'El campo Email es requerido',
			                'email.email' => 'El formato de Email es incorrecto',
			                'email.between' => 'Debe contener entre 3 y 80 caracteres',


			                'clave.required' => 'El campo Clave es requerido',
			                'clave.between' => 'Debe contener entre 8 y 20 caracteres',
							);


			$validar=Validator::make(Input::All(),$rules,$infomesaje);

			if($validar->passes())
			{

				$user=array(
					        'email'=>Input::get('email'),
					        'password'=>(Input::get('clave')),
					        'StatusId' => 1
							);
				$remember=Input::get('remenber');

				if( Auth::user()->attempt($user,$remember ))
			    {
			        // return Redirect::route("showwelcome");
			        return Response::json(array(
                    'success'         =>     true,
                    'message'         =>     "welcome",
                    // 'errors'         =>     array('email' => '' , 'clave' => '')
                    ));
                    
			    }
			    else
			    {
			    	return Response::json(array(
                    'success'         =>     "falselog",
                    'message'         =>     "<div class='has-error has-feedback'><center><label class='control-label'><center>Las credenciales son Incorrectas</center></label></center></div>",
                    'errors'         =>     array('email' => '' , 'clave' => '')
                    ));
			    }

				
			}
			else
			{
				return Response::json(array(
	                    'success'         =>     false,
	                    'message'         =>     "no log ",
	                    'errors'         =>     $validar->getMessageBag()->toArray()
	                    ));
			}

	

		}

		// $user=array(
		// 			        'email'=>Input::get('email'),
		// 			        'password'=>(Input::get('clave')),
		// 			        'StatusId' => 1
		// 					);
		// 		$remember=Input::get('remenber');

		// if( Auth::user()->attempt($user,$remember ))
		// 	    {
		// 	        return Redirect::route("showwelcome");
		// 	        // return Response::json(array(
  //          //          'success'         =>     true,
  //          //          'message'         =>     "logueado ".Input::get('email')." ".Input::get('clave')." ".Input::get('token')." ".Input::get('remenber')." ",
  //          //          'errors'         =>     array('email' => '' , 'clave' => '')
  //          //          ));
                    
		// 	    }
		
	}

	public function makeLogout()
	{
		 Auth::user()->logout();
		 return Redirect::route("index");
	}

	public function showWelcome()
	{
		return View::make('pages.welcome');
	}

}