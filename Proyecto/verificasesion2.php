<?php 
require_once("verificasesion2.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script type="text/javascript" src="JS/JQuery.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="sesion2.css">

    <link rel="stylesheet" href="alertify/css/alertify.min.css">
    <script src="alertify/alertify.min.js"></script>


</head>
<body>

<nav>
<ul>
    <h1>ADMINISTRADOR</h1>
</ul>
</nav>

<br>

<nav class="menu2">
    <a href="#" id="Usuarios">Usuarios</a>
    <a href="#" id="mostrarFormulario">Búsqueda</a>

    <a href="#" id="cerrar-sesion" onclick="cerrarsesion()">Cerrar sesión</a>
</nav>

<div class="contenido"></div>

<div id="formularioBusqueda">
    <div class="container">
        <h1 style="text-align: center;">Consulta de Usuarios</h1>
        <div style="margin-bottom: 20px;">
            <button onclick="loadData()">Consultar usuarios</button>
            <button id="Excel">Generar Excel</button>
            <button id="limpiar">Limpiar</button>
        </div>

        <button id="agregar">Agregar</button>
        <button id="modificar">Modificar</button>
        <button id="eliminar">Eliminar</button>
    </div>
</div>

<br><br>
<div id="campos" style="display: none;">
<input id="n" type="text" name="nombre" placeholder="Nombre" >
<input id="e" type="text" name="usuario" placeholder="Usuario" >
<input id="co" type=text name="correo" placeholder="Correo Electrónico" >
<input id="c" type="text" name="contrasenia" placeholder="Contraseña">
<button id="guardar">Guardar</button>
</div>


<script>
    $(document).ready(function() {
        // Al hacer clic en el botón "Agregar"
        $("#agregar").click(function() {
            // Muestra los campos de entrada y el botón "Guardar"
            $("#campos").show();
        });

        // Al cargar la página, verifica si los campos están llenos
        verificarCamposLlenos();

        // Cuando se cambia el contenido de los campos de entrada
        $('input').on('input', function() {
            verificarCamposLlenos();
        });
    });

    function verificarCamposLlenos() {
        var todosLlenos = true;
        // Verifica si todos los campos están llenos
        $('input').each(function() {
            if ($(this).val() === '') {
                todosLlenos = false;
                return false; // Sale del bucle si encuentra un campo vacío
            }
        });

        // Si todos los campos están llenos, habilita el botón de "Guardar"; de lo contrario, deshabilítalo
        $('#guardar').prop('disabled', !todosLlenos);
    }

    $("#guardar").click(function() {
        var n = $("#n").val();
        var e = $("#e").val();
        var co = $("#co").val();
        var c = $("#c").val();
        $.post("guarda.php", { nombre: n, usuario: e, correo: co, contrasenia: c }, function(resp) {
            alertify.success('<h2>Usuario agregado correctamente</h2>', 5);
        });
    });
</script>



<br><br>
<div id="tabla-container" style="display: none;">

    <table id="resultado">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Contraseña</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script src="JS/JQuery.js"></script>
<script>
    
 function loadData() 
 {
        $.ajax({
            url: 'fetchUsers.php',
            type: 'get',
            dataType: 'json',
            success: function(response) 
            {
                var len = response.length;
                var tbody = $("#resultado tbody").empty();
                for (var i = 0; i < len; i++) 
                {
                    var idusuarios = response[i]['Idusuarios'];
                    var nombre = response[i]['Nombre'];
                    var usuario = response[i]['usuario'];
                    var correo = response[i]['correo'];
                    var contraseña = response[i]['contraseña'];

                    var tr_str = "<tr>" +
                        "<td>" + idusuarios + "</td>" +
                        "<td>" + nombre + "</td>" +
                        "<td>" + usuario + "</td>" +
                        "<td>" + correo + "</td>" +
                        "<td>" + contraseña + "</td>" +
                        "</tr>";

                    tbody.append(tr_str);
                }
                $("#tabla-container").show(); // Muestra la tabla después de cargar los datos
            }
        });
    }

   

            $("#Excel").click(function() {
                // Enviar el contenido HTML del div al servidor
                var contenidoHTML = $("#tabla-container").html();
                $.post("EXCEL.php", { contenido: contenidoHTML }, function(response) {
                    // Crear un enlace temporal para descargar el archivo
                    var link = document.createElement('a');
                    link.href = 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,' + response;
                    link.download = 'archivo.xlsx';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                });
            });

    document.getElementById('limpiar').addEventListener('click', function() {
        $("#resultado tbody").empty();
    });

    document.getElementById('consultar').addEventListener('click', function() {
        loadData();
    });
</script>




<script>
    
alertify.success('<h2>Inicio correcto de administrador</h2>', 5);

</script>


<script src="https://cdn.jsdelivr.net/npm/alertifyjs/build/alertify.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/alertify.min.css"/>



<script type="text/javascript">
    function cerrarsesion() {
        // Mostrar la alerta de confirmación de Alertify
        alertify.confirm('<h2>¿Estás seguro de que quieres salir?</h2>', function () {
            // Si el usuario hace clic en "Aceptar", redirigir a cerrarsesion.php
            location.href = "cerrarsesion.php";
        }, function() {
            // Si el usuario hace clic en "Cancelar", no hacer nada
        });
    }
</script>





</body>
</html>