<?php 
	class TaskController extends BaseController{
		public function getLista(){
			// Recogemos las tareas de ese usuario
			$items=Input::get('items');
			if(!isset($items)){
				$items=10;
			}
			# Hecho sin relaciones
			# $tareas=Task::where('user_id','=',Auth::id())->orderby('created_at','desc')->paginate($items);
			
			# Con relaciones
			$tareas=User::find(Auth::id())->tasks()->orderby('created_at','desc')->paginate($items);
			
			return View::make('lista')->with ('tareas',$tareas)->with('items',$items);
		}
		public function postNueva(){
			$tarea=new Task();
			$tarea->tarea=Input::get('tarea');
			$tarea->user_id=Auth::id();

			$tarea->save();
			return Redirect::to('lista');
		}

		public function getIniciar($id=null){
			if (isset($id)){
				$tarea=Task::find($id);
				$tarea->estado='En proceso';
				$tarea->save();
			}
			return Redirect::to('lista');
		}

		public function getCompletar($id=null){
			if (isset($id)){
				$tarea=Task::find($id);
				$tarea->estado="Completada";
				$tarea->save();
			}
			return Redirect::to('lista');
		}

		public function getEliminar($id=null){
			if (isset($id)){
				$tarea=Task::find($id);
				$tarea->delete();
			}
			return Redirect::to('lista');
		}

		public function getApi($appid=null,$id=null){
			if (isset($appid) && isset($id)){
				$usuario=User::where('appid','=',$appid)->count();
				if($usuario==1){
					$tareas=Task::where('user_id','=',$id)->get();
					return Response::json($tareas);

				}else{ 
						return 'AppID no válido';
					}
			}else{
					return 'No se puede realizar la consulta sin un APPID y un ID';
			}
		}
	}
?>