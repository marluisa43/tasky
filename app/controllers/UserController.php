<?php 
	class UserController extends BaseController{
		public function getRegistro(){
			return View::make('registro');
		}

		public function getLogin(){
			return View::make('login');
		}

		public function getLogout(){
			Auth::logout();
			return Redirect::to('/');
		}

		public function postRegistro(){
			$reglas=array(
						'email'=>'required|email',
						'pass'=>'required|min:8',
						'pass2'=>'required|min:8|same:pass'
						);

			/*$mensajes=array(
							'required'=>'El campo :attribute es obligatorio.',
							'email'=>'El campo :attribute debe contener una dirección de email válida',
							'min'=>'El campo :attribute debe contener al menos :min caracteres.',
							'same'=>' El campo :attribute y :other deben coincidir'
							);
			$validacion=Validator::make(Input::all(),$reglas,$mensajes);*/							  
			$validacion=Validator::make(Input::all(),$reglas);
			if($validacion->fails()){
				return Redirect::to('registro')->withErrors($validacion)->withInput();
			}

			if (Input::get('pass')===Input::get('pass2')){
				$usuario=new User();
				$usuario->email=Input::get('email');
				$usuario->password=Hash::make(Input::get('pass'));
				$usuario->appid=Uuid::generate(4);

				$usuario->save();
				return Redirect::to('login');
			}else{
				return Redirect::to('registro')->withInput();
			}
			return Redirect::to('registro');
		}

		public function postLogin(){
			if(Auth::attempt(array('email'=>Input::get('email'),'password'=>Input::get('pass')),Input::get('recordar'))){
				Log::info(Lang::get('messages.el_usuario').Input::get('email').Lang::get('messages.ha_iniciado_sesion'));
				return Redirect::to('lista');
			}

			// Para obtener la ip del cliente
			$request = Request::instance();
			$request->setTrustedProxies(array('127.0.0.1')); // only trust proxy headers coming from the IP addresses on the array (change this to suit your needs)
			$ip = $request->getClientIp();


			Log::warning('Ha intentado entrar '.Input::get('email').' con la contraseña '.Input::get('pass').' desde la ip '.$ip);
			return Redirect::to('login');
		}

		public function getContacto(){
			return View::make('contacto');
		}

		public function postContacto(){
			$datos=array('email'=>Input::get('email'),'asunto'=>Input::get('asunto'),'mensaje'=>Input::get('mensaje'));
			Mail::send('emails.contacto',$datos, function ($message){
    			$message->to('marluisa43@gmail.com')->subject(Input::get('asunto'));
			});
			return Redirect::to('lista');
		}


	}
?>