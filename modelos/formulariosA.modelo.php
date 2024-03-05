<?php

require_once "conexion.php";

class ModeloFormulariosAlumnos{

   	/*=============================================
	Registro
	=============================================*/
    static public function mdlInsertarInscripcion($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_curso, nombre_alumno, numero_control, talla, sexo, horario, fecha) 
                                               VALUES (:id_curso, :nombre_alumno, :numero_control, :talla, :sexo, :horario, :fecha)");
    
        $stmt->bindParam(":id_curso", $datos["id_curso"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre_alumno", $datos["nombre_alumno"], PDO::PARAM_STR);
        $stmt->bindParam(":numero_control", $datos["numero_control"], PDO::PARAM_STR);
        $stmt->bindParam(":talla", $datos["talla"], PDO::PARAM_STR);
        $stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);       
        $stmt->bindParam(":horario", $datos["horario"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r($stmt->errorInfo());
            return "Error al ejecutar la consulta";
        }
    
        $stmt = null;
    }
  
    
    
    
    static public function mdlMostrarCupo($valor){

        $stmt = Conexion::conectar()->prepare("SELECT cupo FROM curso WHERE id_curso = $valor ");
        #$stmt->bindParam(":id_curso", $valor, PDO::PARAM_INT);

        
    
        $stmt->execute();
    
        return $stmt -> fetch();

    }


    static public function mdlActualizarCupo($id_curso) {
        $stmt = Conexion::conectar()->prepare("UPDATE curso SET cupo = cupo - 1 WHERE id_curso = :id_curso");
        $stmt->bindParam(":id_curso", $id_curso, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
    
        $stmt = null;
    }



    ////
    static public function mdlContarFechaHorario($id_alumno){

        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) AS total FROM inscripciones WHERE numero_control = $id_alumno ");
        #$stmt->bindParam(":id_curso", $valor, PDO::PARAM_INT);

        
    
        $stmt->execute();
    
        return $stmt -> fetch();

    }

    static public function mdlMostrarHorario($id_alumno){

        $stmt = Conexion::conectar()->prepare("SELECT horario FROM inscripciones WHERE numero_control = $id_alumno ");
        #$stmt->bindParam(":id_curso", $valor, PDO::PARAM_INT);

        
    
        $stmt->execute();
    
        return $stmt -> fetchAll();

    }

    static public function mdlMostrarFecha($id_alumno){

        $stmt = Conexion::conectar()->prepare("SELECT fecha FROM inscripciones WHERE numero_control = $id_alumno ");
        #$stmt->bindParam(":id_curso", $valor, PDO::PARAM_INT);

        
    
        $stmt->execute();
    
        return $stmt -> fetchAll();

    }
    
    static public function mdlMostrarHoraFecha($id_alumno){

        $stmt = Conexion::conectar()->prepare("SELECT fecha , horario FROM inscripciones WHERE numero_control = $id_alumno ");
        #$stmt->bindParam(":id_curso", $valor, PDO::PARAM_INT);

        
    
        $stmt->execute();
    
        return $stmt -> fetchAll();

    }


    static public function mdlMostrarInscritoYa($id_alumno,$id_curso){

        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) AS total FROM inscripciones WHERE numero_control = $id_alumno AND id_curso = $id_curso");
        #$stmt->bindParam(":id_curso", $valor, PDO::PARAM_INT);

        
    
        $stmt->execute();
    
        return $stmt -> fetch();

    }
    

    static public function mdlMostrarListaTalleres($id_alumno)
    {
        $stmt = Conexion::conectar()->prepare("SELECT c.id_curso, c.titulo, c.nombre_profesor, c.pdf_descripcion, c.horario, c.fecha, c.aula, c.souvenir, i.talla, c.url_imagen, i.sexo 
        FROM curso c
        INNER JOIN inscripciones i ON c.id_curso = i.id_curso
        WHERE i.numero_control =$id_alumno");
    
        $stmt->execute();
    
        return $stmt->fetchAll();
    }
    
    static public function mdlMostrarAlumno($id_alumno){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE numero_control = '$id_alumno' ");
        #$stmt->bindParam(":id_curso", $valor, PDO::PARAM_INT);

        
    
        $stmt->execute();
    
        return $stmt -> fetchAll();

    }


}