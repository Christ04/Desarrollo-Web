<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario</title>
        <!--Para usar con el segundo metodo de enviar Datos-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
    </head>
    <body>

    <center><h1>FORMULARIO PHP Y AJAX</h1></center>
    <h3>Caracteristicas:</h3>
    <ul style="list-style-type: square"> 
        <li>Formulario con el uso de los diferentes Componentes</li>
        <li>Formulario con validaciones</li>
        <li>Recibe Datos en PHP</li>
        <li>Envio de datos atravez de Ajax</li>
        <li>Envia los datos con Ajax puro y utilizando la libreria JQuery</li>
        <li>Retorna el resultado sin recargar la página</li>
    </ul>
    
    <h4>Para utilizar el segundo metodo reemplazar el nombre de la funcion en el atributo action del form, ver linea de codigo No 29</h4>

    <form method="POST" action="javascript:enviarAjaxPHP()" name="formularioDOM" id="formularioDOM">
<!--<input type="search" placeholder="Buscar">-->
        <fieldset style="background-color:#85C2FF"><!--Define un grupo de Inputs-->
            <legend>Información Personal</legend><!--Define una etiqueta para el grupo de Inputs-->

            <br>

            <!--
            <label for="listIdTiposIdentificacion">Tipos de Identificación:</label>
            <input list="listTiposIdentificacion" id="listIdTiposIdentificacion" required>
            <datalist id="listTiposIdentificacion">
                <option value="Tarjeta Identidad">
                <option value="Cedula Ciudadania">
                <option value="Cedula Extranjeria">
            </datalist>
            -->

            <label for="selectIdTiposIdentificacion">Tipos de Identificación:</label>
            <select id="selectIdTiposIdentificacion" name="selectTiposIdentificacion">
                <option value="ti">Tarjeta Identidad</option>
                <option value="cc" selected>Cedula de Ciudadania</option>
                <option value="ce">Cedula de Extranjeria</option>
            </select>

            <br><br>

            <label for="inputIdIdentificacion">Identificación</label>
            <input type="text" id="inputIdIdentificacion" name="inputIdentificacion" maxlength="50" placeholder="No Documento" required>

            <br><br>

            <label for="inputIdNombre">Nombre(s):</label>
            <input type="text" id="inputIdNombre" name="inputNombre" maxlength="50" placeholder="Nombre(s)" required>

            <br><br>

            <label for="inputIdApellido">Apellidos:</label>
            <input type="text" id="inputIdApellido" name="inputApellido" maxlength="50" placeholder="Apellidos" required>

            <br><br>

            <label for="">Sexo:</label><br>
            <input type="radio" name="inputSexo" value="Masculino" checked>Masculino<br>
            <input type="radio" name="inputSexo" value="Femenino">Femenino

            <br><br>

            <label for="inputIdEmail">Email:</label>
            <input type="email" id="inputIdEmail" name="inputCorreoElectronico" placeholder="Correo Electronico">

            <br><br>

            <label for="inputIdEstadoCivil">Estado Civil</label>
            <input type="checkbox" id="inputIdEstadoCivil" name="inputEstadoCivil" value="Soltero" pattern>Soltero
            <input type="checkbox" id="inputIdEstadoCivil" name="inputEstadoCivil" value="Casado">Casado
            <input type="checkbox" id="inputIdEstadoCivil" name="inputEstadoCivil" value="Union Libre">Union Libre

        </fieldset>

        <br>

        <fieldset style="background-color: #FF7575">
            <legend>Otra Información</legend>

            <br>

            <div>
                <label for="fechaIdInicio">Fecha Inicio</label>
                <input id="fechaIdInicio" type="date" name="inputFechaInicio">

                <label for="monthIdInicio">Mes Inicio</label>
                <input id="monthIdInicio" name="inputMesInicio" type="month">

                <label for="weekIdInicio">Semana Inicio</label>
                <input id="weekIdInicio" name="inputSemanaInicio" type="week">
            </div>

            <br>

            <div>
                <label for="fechaIdFinal">Fecha Final</label>
                <input id="fechaIdFinal" type="date" name="inputFechaFinal">

                <label for="monthIdFinal">Mes Final</label>
                <input id="monthIdFinal" name="inputMesFinal" type="month">

                <label for="weekIdFinal">Semana Final</label>
                <input id="weekIdFinal" name="inputSemanaFinal" type="week">
            </div>

            <br>

            <label for="textAreaIdObservacion">Observación</label>
            <textarea id="textAreaIdObservacion" name="textAreaObservacion" maxlength="500" placeholder="Escriba cualquier observación"></textarea>

        </fieldset>

        <br>

        <fieldset style="background-color: #75FF75">
            <legend>Crear Usuario</legend>

            Foto Usuario: 
            <input id="inputIdFotoUsuario" type="file" name="inputFotoUsuario">
            <br><br>
            <label for="inputIdNombreUsuario">Usuario</label>
            <input type="text" id="inputIdNombreUsuario" name="inputNombreUsuario" placeholder="Usuario" required>
            <br><br>
            <label for="inputIdContrasena">Contraseña</label>
            <input type="password" id="inputIdContrasena" name="inputContrasena" placeholder="Contraseña" required>
            <br><br>
            <label for="inputIdColorUsuario">Color Usuario</label>
            <input type="color" id="inputIdColorUsuario" name="inputColorUsuario">

        </fieldset>

        <br><br>

        <center>
            <input type="reset" name="inputResetearCampos">
            <input type="submit" name="inputEnviar" value="Enviar">
        </center>
    </form>

    <h3>Respuesta Mediante Ajax</h3>
    <div id="respuesta" style="background-color: #85CFFF"></div>


    <?php
    // put your code here
    ?>

    <script type="text/javascript"> //Primer Metodo Usando Ajax Puro
        function enviarAjaxPHP() {
            var xmlhttp = new XMLHttpRequest();//Instancia de un XMLHttpRequest Object http://www.w3schools.com/ajax/ajax_xmlhttprequest_create.asp
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("respuesta").innerHTML = xmlhttp.responseText;
                }
            }
            var datosFormulario = new FormData(document.getElementById("formularioDOM"));
            xmlhttp.open("POST", "procesarDatosModo1.php", true);
            xmlhttp.send(datosFormulario);
        }
    </script>


    <script type="text/javascript">//Segundo metodo de envio Ajax usando Jquery y Json, 
        //para usar debe cambiar la direccion en el parametro action del form en la linea 29
        function enviarAjaxJQueryJsonPhp() {
            var formulario = $("#formularioDOM").serializeArray();
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "procesarDatosModo2.php",
                data: formulario
            }).done(function (resp) {
                $("#respuesta").html(resp);
            });
        }
    </script>
</body>
</html>
