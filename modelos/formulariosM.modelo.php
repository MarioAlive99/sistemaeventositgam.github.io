<?php

require_once "conexion.php";

class ModeloFormulariosMaestros{

   	/*=============================================
	Registro
	=============================================*/

    
        // ...
    
        static public function mdlInsertarCurso($tabla, $datos) {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titulo, numero_control_profesor, nombre_profesor, pdf_descripcion, souvenir, precio, tipo, horario, fecha, fechafinal, aula, url_imagen) 
                                                   VALUES (:titulo, :numero_control_profesor, :nombre_profesor, :pdf_descripcion, :souvenir, :precio, :tipo, :horario, :fecha, :fechafinal, :aula, :url_imagen)");
        
            $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
            $stmt->bindParam(":numero_control_profesor", $datos["numero_control_profesor"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre_profesor", $datos["nombre_profesor"], PDO::PARAM_STR);
            $stmt->bindParam(":pdf_descripcion", $datos["pdf_descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":souvenir", $datos["souvenir"], PDO::PARAM_STR);
            $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
            $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
            $stmt->bindParam(":horario", $datos["horario"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
            $stmt->bindParam(":fechafinal", $datos["fechafinal"], PDO::PARAM_STR);
            $stmt->bindParam(":aula", $datos["aula"], PDO::PARAM_STR);
            $stmt->bindParam(":url_imagen", $datos["url_imagen"], PDO::PARAM_STR);
        
            if ($stmt->execute()) {
                return "ok";
            } else {
                print_r($stmt->errorInfo());
                return "Error al ejecutar la consulta";
            }
        
            $stmt = null;
        }
    
        // ...
  
        static public function mdlMostrarListaTalleres($tabla)
        {  
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");    
            $stmt->execute();    
            return $stmt->fetchAll();
            $stmt = null;
        }  

        //////
        
        static public function mdlMostrarMaestro($id_maestro){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM curso WHERE numero_control_profesor = '$id_maestro' ");
            #$stmt->bindParam(":id_curso", $valor, PDO::PARAM_INT);
    
            
        
            $stmt->execute();
        
            return $stmt -> fetchAll();
    
        }

        ////
        static public function mdlMostrarCurso($id_curso){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM curso WHERE id_curso = $id_curso ");
            #$stmt->bindParam(":id_curso", $valor, PDO::PARAM_INT);
    
            
        
            $stmt->execute();
        
            return $stmt -> fetch();
    
        }


        ///

        static public function mdlActualizarCurso($datos) {
            $stmt = Conexion::conectar()->prepare("UPDATE curso SET titulo=:titulo, numero_control_profesor=:numero_control_profesor, nombre_profesor=:nombre_profesor, pdf_descripcion=:pdf_descripcion, souvenir=:souvenir, precio=:precio, tipo=:tipo, horario=:horario, fecha=:fecha, fecha=:fechafinal, aula=:aula, url_imagen=:url_imagen WHERE id_curso = :id_curso");
        
            $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
            $stmt->bindParam(":numero_control_profesor", $datos["numero_control_profesor"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre_profesor", $datos["nombre_profesor"], PDO::PARAM_STR);
            $stmt->bindParam(":pdf_descripcion", $datos["pdf_descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":souvenir", $datos["souvenir"], PDO::PARAM_STR);
            $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
            $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
            $stmt->bindParam(":horario", $datos["horario"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
            $stmt->bindParam(":fechafinal", $datos["fechafinal"], PDO::PARAM_STR);
            $stmt->bindParam(":aula", $datos["aula"], PDO::PARAM_STR);
            $stmt->bindParam(":url_imagen", $datos["url_imagen"], PDO::PARAM_STR);
            $stmt->bindParam(":id_curso", $datos["id_curso"], PDO::PARAM_INT);
        
            if ($stmt->execute()) {
                return "ok";
            } else {
                print_r($stmt->errorInfo());
                return "Error al ejecutar la consulta";
            }
        
            $stmt = null;
        }
        static public function mdlMostrarTallerInscritos($id_curso)
        {
            $stmt = Conexion::conectar()->prepare("SELECT c.titulo, c.pdf_descripcion, c.horario, c.fecha, c.aula, c.souvenir, i.numero_control, i.nombre_alumno, i.talla, c.url_imagen
            FROM curso c
            INNER JOIN inscripciones i ON c.id_curso = i.id_curso
            WHERE c.id_curso = $id_curso");
        
            $stmt->execute();
        
            return $stmt->fetchAll();
        }

        static public function mdlInsertarMaestrosMasivos($datos) {
            $stmt = Conexion::conectar()->prepare("INSERT INTO usuario (numero_control, nombre, tipo_usuario, carrera, semestre, grupo, correo, password, fecha, limite) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
            try {
                foreach ($datos as $registro) {
                    $stmt->execute($registro);
                }
                
                // Retorna un mensaje de éxito
                return "Inserción de maestros exitosa.";
            } catch (Exception $e) {
                // Retorna un mensaje de error
                return "Error al insertar los Maestros: " . $e->getMessage();
            }
        }
    
    }


    