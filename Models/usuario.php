<?php
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: ELivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class Usuario
{
	//atributos
	public $id;
	public $alias;
	public $nombres;
	public $email;

	//constructor de la clase
	function __construct($id, $alias, $nombres, $email)
	{
		$this->id=$id;
		$this->alias=$alias;
		$this->nombres=$nombres;
		$this->email=$email;
	}

	//función para obtener todos los usuarios
	public static function all(){
		$listaUsuarios =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM usuarios');

		// carga en la $listaUsuarios cada registro desde la base de datos
		foreach ($sql->fetchAll() as $usuario) {
			$listaUsuarios[]= new Usuario($usuario['id'],$usuario['alias'], $usuario['nombres'],$usuario['email']);
		}
		return $listaUsuarios;
	}

	//la función para registrar un usuario
	public static function save($usuario){
			$db=Db::getConnect();
			$insert=$db->prepare('INSERT INTO USUARIOS VALUES(NULL,:alias,:nombres, :email)');
			$insert->bindValue('alias',$usuario->alias);
			$insert->bindValue('nombres',$usuario->nombres);
			$insert->bindValue('email',$usuario->email);
			$insert->execute();
		}

	//la función para actualizar 
	public static function update($usuario){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE usuarios SET alias=:alias, nombres=:nombres, email=:email WHERE id=:id');
		$update->bindValue('id',$usuario->id);
		$update->bindValue('alias',$usuario->alias);
		$update->bindValue('nombres',$usuario->nombres);
		$update->bindValue('email',$usuario->email);
		$update->execute();
	}

	// la función para eliminar por el id
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM usuarios WHERE ID=:id');
		$delete->bindValue('id',$id);
		$delete->execute();
	}

	//la función para obtener un usuario por el id
	public static function getById($id){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuarios WHERE ID=:id');
		$select->bindValue('id',$id);
		$select->execute();
		//asignarlo al objeto usuario
		$usuarioDb=$select->fetch();
		$usuario= new Usuario($usuarioDb['id'],$usuarioDb['alias'],$usuarioDb['nombres'],$usuarioDb['email']);
		return $usuario;
	}
}
?>