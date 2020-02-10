<?php 
	/**
	* Descripción: Controlador para la entidad usuario
	* Autor: Elivar Largo
	* Web: www.ecodeup.com
	* Fecha: 25-02-2017
	*/
	class UsuarioController
	{	
		public function __construct(){}

		public function index(){
			//echo 'index desde UsuarioController';
			
			$usuarios=Usuario::all();
			require_once('Views/Usuario/index.php');
		}

		public function register(){
			require_once('Views/Usuario/register.php');
		}

		//guardar
		public function save($usuario){
			Usuario::save($usuario);
			header('Location: ../index.php');
		}

		public function update($usuario){
			Usuario::update($usuario);
			header('Location: ../index.php');
		}

		public function delete($id){
			//se está de dentro del directorio Controllers y se debe salir con ../
			require_once('../Models/usuario.php');
			Usuario::delete($id);
			header('Location: ../index.php');
		}
		
		public function error(){
			require_once('Views/Usuario/error.php');
		} 
	}


	//obtiene los datos del usuario desde la vista y redirecciona a UsuarioController.php
	if (isset($_POST['action'])) {
		$usuarioController= new UsuarioController();
		//se añade el archivo usuario.php
		require_once('../Models/usuario.php');
		
		//se añade el archivo para la conexion
		require_once('../connection.php');

		if ($_POST['action']=='register') {
			$usuario= new Usuario(null,$_POST['alias'],$_POST['nombres'],$_POST['email']);
			$usuarioController->save($usuario);
		}elseif ($_POST['action']=='update') {
			$usuario= new Usuario($_POST['id'],$_POST['alias'],$_POST['nombres'],$_POST['email']);
			$usuarioController->update($usuario);
		}		
	}

	//se verifica que action esté definida
	if (isset($_GET['action'])) {
		if ($_GET['action']!='register'&$_GET['action']!='index') {
			require_once('../connection.php');
			$usuarioController=new UsuarioController();
			//para eliminar
			if ($_GET['action']=='delete') {		
				$usuarioController->delete($_GET['id']);
			}elseif ($_GET['action']=='update') {//mostrar la vista update con los datos del registro actualizar
				require_once('../Models/usuario.php');				
				$usuario=Usuario::getById($_GET['id']);		
				//var_dump($usuario);
				//$usuarioController->update();
				require_once('../Views/Usuario/update.php');
			}	
		}	
	}
?>