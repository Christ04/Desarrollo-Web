<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//RECIBIR PARAMETROS
$tipoIdentificacion = $_POST["selectTiposIdentificacion"];
$identificacion = $_POST["inputIdentificacion"];
$nombre = $_POST["inputNombre"];
$apellidos = $_POST["inputApellido"];
$sexo = $_POST["inputSexo"];
$email = $_POST["inputCorreoElectronico"];
$estadoCivil = $_POST["inputEstadoCivil"];
$fechaInicio = $_POST["inputFechaInicio"];
$mesInicio = $_POST["inputMesInicio"];
$semanaInicio = $_POST["inputSemanaInicio"];
$fechaFinal = $_POST["inputFechaFinal"];
$mesFinal = $_POST["inputMesFinal"];
$semanaFinal = $_POST["inputSemanaFinal"];
$observacion = $_POST["textAreaObservacion"];
//$fotoUsuario = $_FILES['inputFotoUsuario']['name'];
$nombreUsuario = $_POST["inputNombreUsuario"];
$contrasena = $_POST["inputContrasena"];
$colorUsuario = $_POST["inputColorUsuario"];

//Insertar Codigo de la logica de su aplicacion, si va a consultar una base de datos o si va a realizar alguna operacion.


echo json_encode($tipoIdentificacion. "<br>". $identificacion . "<br>" . $nombre . " <br> " . $apellidos . " <br> " . $sexo . " <br> " . $email . " <br> " . $estadoCivil . "<br>"
 . $fechaInicio . "<br>" . $mesInicio . "<br>" . $semanaInicio . "<br>" . $fechaFinal . "<br>" . $mesFinal . "<br>" . $semanaFinal . "<br> "
 . $observacion . " <br> " . $nombreUsuario . " <br> " . $contrasena . " <br> " . $colorUsuario);

//.  " <br> " . $fotoUsuario
?>
