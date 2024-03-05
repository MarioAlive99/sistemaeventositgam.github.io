<?php

require_once "conexion.php";

class ModeloFormularios{

	/*=============================================
	Registro
	=============================================*/

	static public function mdlRegistro($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(numero_control, nombre, tipo_usuario, carrera, semestre, grupo, correo, password) VALUES (:numero_control, :nombre, 'alumno', :carrera, :semestre, :grupo, :correo, :password)");

		$stmt->bindParam(":numero_control", $datos["numero_control"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":semestre", $datos["semestre"], PDO::PARAM_STR);
		$stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt = null;	
	}

		/*=============================================
	Registro Maestro
	=============================================*/

	static public function mdlRegistroMaestro($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(numero_control, nombre, tipo_usuario, carrera, semestre, grupo, correo, password) VALUES (:numero_control, :nombre, 'maestro', :carrera, :semestre, :grupo, :correo, :password)");

		$stmt->bindParam(":numero_control", $datos["numero_control"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":semestre", $datos["semestre"], PDO::PARAM_STR);
		$stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt = null;	
	}


	/*=============================================
	Seleccionar Registros
	=============================================*/
	/*=============================================
	Registro mail
	=============================================*/
	static public function mdlExisteCorreo($tabla, $correo) {

		$stmt = Conexion::conectar()->prepare("SELECT correo FROM $tabla WHERE correo = :correo");
	
		$stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
	
		if($stmt->execute()) {
			$resultado = $stmt->fetch();
	
			if($resultado) {
				return true;
			} else {
				return false;
			}
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}
	
		$stmt = null;
	}


/*=============================================
	Seleccionar Registros
	=============================================*/
	/*=============================================
	Registro mail
	=============================================*/
	static public function mdlExisteNúmeroControl($tabla, $numero_control) {

		$stmt = Conexion::conectar()->prepare("SELECT numero_control FROM $tabla WHERE numero_control = :numero_control");
	
		$stmt->bindParam(":numero_control", $numero_control, PDO::PARAM_STR);
	
		if($stmt->execute()) {
			$resultado = $stmt->fetch();
	
			if($resultado) {
				return true;
			} else {
				return false;
			}
		} else {
			print_r(Conexion::conectar()->errorInfo());
		}
	
		$stmt = null;
	}

	/*=============================================
	Seleccionar Registros
	=============================================*/

	static public function mdlSeleccionarRegistros($tabla, $item, $valor){

		if($item == null && $valor == null){

			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla ORDER BY id_user DESC");

			$stmt->execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item ORDER BY id_user DESC");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt -> fetch();
		}
 

		$stmt = null;	

	}

	/*=============================================
	Actualizar Registro
	=============================================*/

	static public function mdlActualizarRegistro($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, email=:email, password=:password WHERE id = :id");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		 

		$stmt = null;	

	}

	/*=============================================
	Eliminar Registro
	=============================================*/
	static public function mdlEliminarRegistro($tabla, $campo, $valor){
	
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  $campo = :id");

		$stmt->bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}
 
		$stmt = null;	

	}

////


	/*=============================================
	Eliminar Registro De inscripción
	=============================================*/
	static public function mdlEliminarInscripcion($valor){
	
		$stmt = Conexion::conectar()->prepare("DELETE FROM inscripciones WHERE  numero_control = :id");

		$stmt->bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}
 
		$stmt = null;	

	}

////

static public function mdlActualizarRegistroAlumno($tabla, $datos){
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, carrera=:carrera, grupo=:grupo, semestre=:semestre WHERE numero_control = :numero_control");

    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
    $stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
    $stmt->bindParam(":semestre", $datos["semestre"], PDO::PARAM_INT);
    $stmt->bindParam(":numero_control", $datos["numero_control"], PDO::PARAM_INT);

    if($stmt->execute()){
        return "ok";
    } else {
        print_r(Conexion::conectar()->errorInfo());
    }

    $stmt = null;
}


///////

static public function mdlActualizarCupo($datos){
    $stmt = Conexion::conectar()->prepare("UPDATE curso SET cupo = cupo + 1 WHERE id_curso = $datos");

    

    if($stmt->execute()){
        return "ok";
    } else {
        print_r(Conexion::conectar()->errorInfo());
    }

    $stmt = null;
}



//////////////
 

/////////

static public function mdlObtenerCupoCurso($id){
    $stmt = Conexion::conectar()->prepare("SELECT cupo FROM curso WHERE id_curso = :id");

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    return $resultado['cupo'];
}


static public function mdlMostrarUnSoloMaestro($item,$id_alumno){

	$stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE $item = '$id_alumno' ");
	#$stmt->bindParam(":id_alumno", $valor, PDO::PARAM_INT);

	

	$stmt->execute();

	return $stmt -> fetch();

}
//////////////mostrar un solo curso modelo
public static function mdlMostrarUnSoloCurso($item, $valor)
{
    $stmt = Conexion::conectar()->prepare("SELECT * FROM curso WHERE $item = :valor");
    $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
}


//////////////mostrar una sola inscripcion
 
public static function mdlMostrarUnaSolaInscripcion($valor)
{
    $stmt = Conexion::conectar()->prepare("SELECT i.id_inscripcion, c.id_curso, c.titulo, i.nombre_alumno, c.pdf_descripcion, c.horario, c.fecha, c.aula, c.souvenir, i.talla
	FROM curso c
	INNER JOIN inscripciones i ON c.id_curso = i.id_curso WHERE i.id_inscripcion = :valor");
    $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}



//////editausuarios

static public function mdlBuscaEidtarUsuarios($id_usuario){

	$stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE numero_control = '$id_usuario' ");
	#$stmt->bindParam(":id_curso", $valor, PDO::PARAM_INT);

	

	$stmt->execute();

	return $stmt -> fetch();

}
////////////////////////editando
static public function mdlActualizarInscripciones($datos) {

	 $talla = $datos["talla"];
	 $sexo = $datos["sexo"];
	 $id = $datos["numero_control"];

	$stmt = Conexion::conectar()->prepare("UPDATE inscripciones SET talla = '$talla', sexo='$sexo' WHERE numero_control = '$id'");
       
	if ($stmt->execute()) {
		return "ok";
    } else {
        print_r($stmt->errorInfo());
        return "Error al ejecutar la consulta";
    }

    $stmt = null;
	
    
}





///////////////

static public function mdlActualizarMaestroAdmin($tabla, $datos) {
    $stmt = Conexion::conectar()->prepare("UPDATE usuario SET nombre=:nombre, carrera=:carrera, correo=:correo, password=:password WHERE numero_control = :numero_control");

    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
    $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
    $stmt->bindParam(":numero_control", $datos["numero_control"], PDO::PARAM_STR);

    if ($stmt->execute()) {
        return "ok";
    } else {
        print_r($stmt->errorInfo());
        return "Error al ejecutar la consulta";
    }

    $stmt = null;
}
//////////trayendo la tabla para areaadminmaestro
static public function mdlMostrarListarTodosMaestros($item) {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE tipo_usuario = :item");
    $stmt->bindParam(":item", $item, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt = null;
}
////
      static public function mdlMostrarListaInscriptos()
	  {
        $stmt = Conexion::conectar()->prepare("SELECT i.id_inscripcion, c.id_curso, c.titulo,i.numero_control,  i.nombre_alumno, c.pdf_descripcion, c.horario, c.fecha, c.aula, c.souvenir, i.talla
        FROM curso c
        INNER JOIN inscripciones i ON c.id_curso = i.id_curso
		ORDER BY i.numero_control");
    
        $stmt->execute();
    
        return $stmt->fetchAll();
    }  


}