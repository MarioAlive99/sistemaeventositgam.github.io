<?php

require_once "conexion.php";

class ModeloFormulariosPagos{



////
      static public function mdlMostrarListaPagos()
	  {
        $stmt = Conexion::conectar()->prepare("SELECT pagos.id_pagos, inscripciones.nombre_alumno, curso.souvenir, inscripciones.numero_control, curso.titulo, pagos.fecha_pago, inscripciones.talla, inscripciones.sexo
        FROM inscripciones
        JOIN pagos ON inscripciones.numero_control = pagos.numero_control_alumno
        JOIN curso ON inscripciones.id_curso = curso.id_curso
        WHERE inscripciones.numero_control
        IN ( 
        SELECT numero_control_alumno
        FROM pagos) ORDER BY inscripciones.numero_control");
    
        $stmt->execute();
    
        return $stmt->fetchAll();
    }  


    static public function mdlMostrarListaPagosMujeres()
{
    $stmt = Conexion::conectar()->prepare("SELECT pagos.id_pagos, inscripciones.nombre_alumno, inscripciones.numero_control, curso.souvenir, curso.titulo, pagos.fecha_pago, inscripciones.talla, inscripciones.sexo
    FROM inscripciones
    JOIN pagos ON inscripciones.numero_control = pagos.numero_control_alumno
    JOIN curso ON inscripciones.id_curso = curso.id_curso
    WHERE inscripciones.sexo = 'MUJER'
    AND inscripciones.numero_control IN (
        SELECT numero_control_alumno
        FROM pagos
    )
    ORDER BY inscripciones.numero_control");

    $stmt->execute();

    return $stmt->fetchAll();
}

static public function mdlMostrarListaPagosHombres()
{
    $stmt = Conexion::conectar()->prepare("SELECT pagos.id_pagos, inscripciones.nombre_alumno, inscripciones.numero_control, curso.souvenir, curso.titulo, pagos.fecha_pago, inscripciones.talla, inscripciones.sexo
    FROM inscripciones
    JOIN pagos ON inscripciones.numero_control = pagos.numero_control_alumno
    JOIN curso ON inscripciones.id_curso = curso.id_curso
    WHERE inscripciones.sexo = 'HOMBRE'
    AND inscripciones.numero_control IN (
        SELECT numero_control_alumno
        FROM pagos
    )
    ORDER BY inscripciones.numero_control");

    $stmt->execute();

    return $stmt->fetchAll();
}

 
    static public function mdlInsertarPagos($datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO pagos (numero_control_alumno, fecha_pago) VALUES ( ?, ?)");
    
        try {
            foreach ($datos as $registro) {
                $stmt->execute($registro);
            }
            
            // Retorna un mensaje de éxito
            return "Inserción de pagos exitosa.";
        } catch (Exception $e) {
            // Retorna un mensaje de error
            return "Error al insertar los pagos: " . $e->getMessage();
        }
    }

    static public function mdlVaciarPagos(){
        try {
            $stmt = Conexion::conectar()->prepare("TRUNCATE TABLE pagos");
            $stmt->execute();
    
            return true; // Éxito al vaciar la tabla
        } catch (Exception $e) {
            return "Error al vaciar la tabla de pagos: " . $e->getMessage();
        }
    }

	static public function mdlMostrarCarrusel(){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM carrusel");
		
		$stmt->execute();
	
		return $stmt -> fetch();
	
	}


    static public function mdlActualizarCarrusel($columna, $valor) {
        $stmt = Conexion::conectar()->prepare("UPDATE carrusel SET $columna = :valor");
        $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
    
        $stmt = null;
    }

/////////////

static public function contarTallasMujeres()
{
    $conexion = Conexion::conectar();

    $tallas = array('ExCH', 'CH', 'M', 'G', 'ExG');
    $counts = array();

    foreach ($tallas as $talla) {
        $stmt = $conexion->prepare("
            SELECT COUNT(*) AS count
            FROM inscripciones
            JOIN pagos ON inscripciones.numero_control = pagos.numero_control_alumno
            JOIN curso ON inscripciones.id_curso = curso.id_curso
            WHERE inscripciones.talla = :talla
            AND inscripciones.sexo = 'MUJER'
            AND inscripciones.numero_control IN (
                SELECT numero_control_alumno
                FROM pagos
            )
        ");

        $stmt->bindParam(':talla', $talla);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $row['count'];
        $counts[$talla] = $count;
    }

    return $counts;
}


static public function contarTallasHombres()
{
    $conexion = Conexion::conectar();

    $tallas = array('ExCH', 'CH', 'M', 'G', 'ExG');
    $counts = array();

    foreach ($tallas as $talla) {
        $stmt = $conexion->prepare("
            SELECT COUNT(*) AS count
            FROM inscripciones
            JOIN pagos ON inscripciones.numero_control = pagos.numero_control_alumno
            JOIN curso ON inscripciones.id_curso = curso.id_curso
            WHERE inscripciones.talla = :talla
            AND inscripciones.sexo = 'HOMBRE'
            AND inscripciones.numero_control IN (
                SELECT numero_control_alumno
                FROM pagos
            )
        ");

        $stmt->bindParam(':talla', $talla);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $row['count'];
        $counts[$talla] = $count;
    }

    return $counts;
}




}


?>