<?php 
require_once("verificasesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="entrar.css">
    <script src="JS/JQuery.js"></script>

    <link rel="stylesheet" href="alertify/css/alertify.min.css">
    <script src="alertify/alertify.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

</head>
<body>
   
   <div class="background"></div>

   <nav class="nav">
    <!-- Tus elementos de menú existentes -->
    <a href="#"></a>
    <a href="#"></a>
    <!-- Elemento de menú para cerrar sesión -->
    <a href="#" id="cerrar-sesion" onclick="cerrarsesion()">Cerrar sesión</a>
</nav>

<!--<button onclick="cerrarsesion()">x</button>--> 



<br><br><br>


<nav class="menu2">
    <a href="#" id="profesores">Profesores</a>
    <a href="#" id="loadChart">Grafica</a>
    <a href="#" id="mostrarFormulario">Búsqueda</a>
    <a id="nuevo" href="web_scraping.html">comparaciones</a>
    <a id="nuevo" href="#">Nuevo</a>
</nav>


<canvas id="myChart" width="400" height="200" style="display: none;"></canvas>

<script>
        document.getElementById('loadChart').addEventListener('click', function() {
            document.getElementById('myChart').style.display = 'block';
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Ing. Alan Espinoza Aguirre', 'D. C. C. Elias Ruiz Hernandez', 'Lic. Rubicel Herver Gomez', 'M. T. I. José Martín Cruz Domínguez', 'Ing. Emmanuel Ramírez Romero', 'Lic. Tonatiuth Yllescas Trejo', 'M. en M. Victor Rodriguez Marroquin', 'M. en D. P. Laura Elena Santos Diaz', 'Ing. Hector Hernández Mendoza', 'M.A.C. Mónica Jimenez Gutierrez'],
                    datasets: [{
                        label: 'Número de Cursos',
                        data: [5, 4, 3, 6, 2, 4, 2, 4, 1, 5],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(199, 199, 199, 0.2)',
                            'rgba(88, 101, 242, 0.2)',
                            'rgba(243, 156, 18, 0.2)',
                            'rgba(39, 174, 96, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(199, 199, 199, 1)',
                            'rgba(88, 101, 242, 1)',
                            'rgba(243, 156, 18, 1)',
                            'rgba(39, 174, 96, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>




<aside id="opcionesProfesores">
    <!-- Contenido del aside para opciones de profesores -->
    <h3>Información de Profesores</h3>
    <ul>

        <li><a p2="D. C. C. ELIAS RUIZ HERNANDEZ" href="#">D. C. C. ELIAS RUIZ HERNANDEZ</a></li>
        <li><a p10="M.A.C. MÓNICA JIMENEZ GUTIERREZ" href="#">M.A.C. MÓNICA JIMENEZ GUTIERREZ</a></li>
        <li><a p4="M. T. I. JOSÉ MARTÍN CRUZ DOMÍNGUEZ" href="#">M. T. I. JOSÉ MARTÍN CRUZ DOMÍNGUEZ</a></li>
        <li><a p1="Ing. Alan Espinoza Aguirre" href="#">Ing. Alan Espinoza Aguirre</a></li>
        <li><a p3="LIC. RUBICEL HERVER GOMEZ" href="#">LIC. RUBICEL HERVER GOMEZ</a></li>
        <li><a p5="ING. EMMANUEL RAMÍREZ ROMERO" href="#">ING. EMMANUEL RAMÍREZ ROMERO</a></li>
        <li><a p6="LIC. TONATIUTH YLLESCAS TREJO" href="#">LIC. TONATIUTH YLLESCAS TREJO</a></li>
        <li><a p9="ING. HECTOR HERNÁNDEZ MENDOZA" href="#">ING. HECTOR HERNÁNDEZ MENDOZA</a></li>
        <li><a p7="M. EN M. VICTOR RODRIGUEZ MARROQUIN" href="#">M. EN M. VICTOR RODRIGUEZ MARROQUIN</a></li>
        <li><a p8="M. EN D. P. LAURA ELENA SANTOS DÍAZ" href="#">M. EN D. P. LAURA ELENA SANTOS DÍAZ</a></li>
       
    </ul>
</aside>







<div class="contenido"></div>

<!--<button id="generarPDF" class="generarPDF">Generar PDF</button>-->

<style>

.container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"] {
            width: calc(100% - 80px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #2f353b;
            color: #fff;
        }

        td {
            background-color: #f9f9f9;
        }

        .subtable {
            margin-top: 10px;
        }

        .subtable th {
            background-color: #252a2e;
            color: #fff;
        }

        .subtable td {
            background-color: #f9f9f9;
        }
    </style>



    <!-- Formulario oculto por defecto -->
    <div id="formularioBusqueda" style="display: none;">
        <div class="container">
            <h1 style="text-align: center;">Consulta de Datos</h1>
            <div style="margin-bottom: 20px;">
                <label for="nombrep">Ingrese el correo o nombre del docente a buscar</label>
                <input type="text" id="nombrep">

                <button id="buscar">Buscar</button>
                <button id="buscarNombresCorreos">Buscar nombres</button>
            </div>

            <button id="consultodo">Consultar todo</button>

            <button id="pdf">Generar pdf</button>

            <button id="cortar">Limpiar</button>

            <div id="resultado"></div>
            
        </div>
    </div>

    <script src="JS/Jquery.js"></script>

<script>
    

        
        $("#buscar").click(function() 
        {
            var nombre = $("#nombrep").val(); 
            var parametros = 
            {
                "accion": "buscarpornombre", 
                "nombre": nombre 
            };

            var parametros2 = 
            {
                "accion": "buscarporcorreo", 
                "correo": nombre 
            };

            if (nombre.includes("@")) 
            {
                $.post("conexion/consultasNoSQL.php", parametros2, function(resp) 
                {
                    let resultado2 = JSON.parse(resp);
                    if (resultado2 == "no") 
                    {
                        alert("No se encontró el correo especificado");
                    } 
                    else 
                    {
                        construirTablas(resultado2);
                    }
                });
            } 
            else 
            {
                $.post("conexion/consultasNoSQL.php", parametros, function(resp) 
                {
                    let resultado = JSON.parse(resp);
                    if (resultado == "no") 
                    {
                        alert("No se encontró el nombre especificado");
                    } 
                    else 
                    {
                        construirTablas(resultado);
                    }
                });
            }   
        });

        //PDF-------------------------------------------------------------------------------------------------------------
    $("#pdf").click(function() 
    {
        // Enviar el contenido HTML del div al servidor
        var contenidoHTML = $("#resultado").html();
        $.post("PDF.php", { contenido: contenidoHTML }, function(response) 
        {
            // Redirigir al usuario para que descargue el PDF generado
            window.location.href = response;
        });
    });


    function construirTablas(resultado) 
    {
        var rr = '';
        for (const d in resultado) 
        {
            var nombre = resultado[d]["nombre"];
            var correo = resultado[d]["correo"];
            var periodosInst = resultado[d]["periodos_Inst"];
            var periodosHTML = '';

            for (const periodo in periodosInst) {
                if (periodosInst.hasOwnProperty(periodo)) {
                    var periodos = periodosInst[periodo];
                    periodosHTML += '<tr><td colspan="6" style="background-color: #007bff; color: #fff;">Periodo: ' + periodo + '</td></tr>';
                    for (const grupo in periodos) {
                        if (periodos.hasOwnProperty(grupo)) {
                            var datos = periodos[grupo];
                            periodosHTML += '<tr>';
                            periodosHTML += '<td>' + grupo + '</td>';
                            periodosHTML += '<td>' + datos["Carrera"] + '</td>';
                            periodosHTML += '<td>' + datos["Materia"] + '</td>';
                            periodosHTML += '<td>' + datos["totalTemas"] + '</td>';
                            periodosHTML += '<td>' + datos["Semestre"] + '</td>';
                            periodosHTML += '<td>' + datos["ClaveAsignatura"] + '</td>';
                            periodosHTML += '</tr>';
                        }
                    }
                }
            }
            rr += '<h2>' + nombre + '</h2>';
            rr += '<h3>' + correo + '</h3>';
            rr += '<table>';
            rr += '<tr><th>Grupo</th><th>Carrera</th><th>Materia</th><th>Total Temas</th><th>Semestre</th><th>Clave Asignatura</th></tr>';
            rr += periodosHTML;
            rr += '</table>';
        }

        $("#resultado").html(rr);
    }



        $("#consultodo").click(function() {
            var parametros = {
                "accion": "consultodo"
            };

            $.post("conexion/consultasNoSQL.php", parametros, function(resp) {
                //alert(resp);
                let r = JSON.parse(resp);
                var rr = '';

                for (const d in r) {
                    var nombre = r[d]["nombre"];
                    var correo = r[d]["correo"];
                    var periodosInst = r[d]["periodos_Inst"];
                    var periodosHTML = '';

                    for (const periodo in periodosInst) {
                        if (periodosInst.hasOwnProperty(periodo)) 
                        {
                            var periodos = periodosInst[periodo];
                            periodosHTML += '<tr><td colspan="6" style="background-color: #007bff; color: #fff;">Periodo: ' + periodo + '</td></tr>';
                            for (const grupo in periodos) {
                                if (periodos.hasOwnProperty(grupo)) {
                                    var datos = periodos[grupo];
                                    periodosHTML += '<tr>';
                                    periodosHTML += '<td>' + grupo + '</td>';
                                    periodosHTML += '<td>' + datos["Carrera"] + '</td>';
                                    periodosHTML += '<td>' + datos["Materia"] + '</td>';
                                    periodosHTML += '<td>' + datos["totalTemas"] + '</td>';
                                    periodosHTML += '<td>' + datos["Semestre"] + '</td>';
                                    periodosHTML += '<td>' + datos["ClaveAsignatura"] + '</td>';
                                    periodosHTML += '</tr>';
                                }
                            }
                        }
                    }

                    rr += '<h2>' + nombre + '</h2>';
                    rr += '<h3>' + correo + '</h3>';
                    rr += '<table>';
                    rr += '<tr><th>Grupo</th><th>Carrera</th><th>Materia</th><th>Total Temas</th><th>Semestre</th><th>Clave Asignatura</th></tr>';
                    rr += periodosHTML;
                    rr += '</table>';
                }

                $("#resultado").html(rr);
            });
        });

        //-----------------------------------------------------------------------------
        $("#buscarNombresCorreos").click(function() 
        {
            var parametros = 
            {
                "accion": "consultodo"
            };

            $.post("conexion/consultasNoSQL.php", parametros, function(resp) 
            {
                let r = JSON.parse(resp);
                var rr = '<div>';

                for (const d in r) 
                {
                    rr += '<div><table style="border-collapse: collapse;"><tbody>'; // Corrección aquí
                    rr += '<tr><td>Nombre</td><td><label>' + r[d]["nombre"] + '</label></td></tr>';
                    rr += '<tr><td>Correo</td><td>' + r[d]["correo"] + '</td></tr>';
                    rr += '</tbody></table><br><br></div>';
                }

                rr += "</div>";
                $("#resultado").html(rr);
            });
        });




    // Agregar evento de clic al botón "Limpiar"
    document.getElementById('cortar').addEventListener('click', function() {
        // Limpiar el contenido del div resultado
        document.getElementById('resultado').innerHTML = '';
    });

</script>

<script>
    var myChart; // Asegúrate de que esta variable está en el ámbito global

    // Agregar evento de clic al botón "nuevo"
    document.getElementById('nuevo').addEventListener('click', function() {
        // Limpiar el contenido de los divs "resultado" y "contenido"
        document.getElementById('resultado').innerHTML = '';
        document.querySelector('.contenido').innerHTML = '';

        // Verificar si el gráfico existe y destruirlo si es necesario
        if (myChart) {
            myChart.destroy(); // Destruir la instancia del gráfico
            myChart = null; // Opcional: Limpiar la referencia
        }

        // Opcional: Ocultar el canvas si no quieres que se muestre vacío
        document.getElementById('myChart').style.display = 'none';
    });
</script>





<script>


 // Función para mostrar u ocultar el formulario
 document.getElementById('mostrarFormulario').addEventListener('click', function() {
            var formulario = document.getElementById('formularioBusqueda');
            var contenido = document.querySelector('.contenido');

            if (formulario.style.display === 'none') {
                formulario.style.display = 'block';
                contenido.style.display = 'none'; // Ocultar contenido principal
            } else {
                formulario.style.display = 'none';
                contenido.style.display = 'block'; // Mostrar contenido principal
            }
        });



//Aside de opciones

document.addEventListener("DOMContentLoaded", function() {
    // Obtener referencia al enlace de profesores
    var linkProfesores = document.getElementById("profesores");
    
    // Obtener referencia al aside de opciones de profesores
    var opcionesProfesores = document.getElementById("opcionesProfesores");
    
    // Agregar evento clic al enlace de profesores
    linkProfesores.addEventListener("click", function() {
        // Cambiar la posición del aside cuando se hace clic en el enlace de profesores
        if (opcionesProfesores.style.left === "-220px") {
            opcionesProfesores.style.left = "0";
        } else {
            opcionesProfesores.style.left = "-220px";
        }
    });
});




//Profesores


$(document).ready(function() {
        $('a[p1]').click(function() {
            var profesorNombre = $(this).attr('p1'); 

            $.getJSON("I1.json", function(data) {
                var contenidoHTML = '';

                var profesor = data.find(p => p.nombre === profesorNombre);
                if (profesor) {
                    contenidoHTML += '<div class="profesor-info">';
                    contenidoHTML += '<h3>' + profesor.nombre + '</h3>';
                    contenidoHTML += '<p><strong>Correo:</strong> ' + profesor.correo + '</p>';

                    $.each(profesor.periodos_Inst, function(periodo, grupos) {
                        contenidoHTML += '<div><strong>Periodo:</strong> ' + periodo + '</div>';

                        $.each(grupos, function(idGrupo, infoGrupo) {
                            contenidoHTML += '<div class="grupo-info">';
                            contenidoHTML += '<h4>Grupo: ' + idGrupo + '</h4>';
                            contenidoHTML += '<p><strong>Carrera:</strong> ' + infoGrupo.Carrera + '</p>';
                            contenidoHTML += '<p><strong>Materia:</strong> ' + infoGrupo.Materia + '</p>';
                            contenidoHTML += '<p><strong>Semestre:</strong> ' + infoGrupo.Semestre + '</p>';
                            contenidoHTML += '<p><strong>Clave Asignatura:</strong> ' + infoGrupo.ClaveAsignatura + '</p>';
                            contenidoHTML += '<p><strong>Total Temas:</strong> ' + infoGrupo.totalTemas + '</p>';
                            contenidoHTML += '</div>';
                        });
                    });

                    contenidoHTML += '</div>';
                }

                $('.contenido').html(contenidoHTML);
            });
        });

});


$(document).ready(function() {
    $('a[p2]').click(function() {
        var profesorNombre = $(this).attr('p2'); 

        $.getJSON("I2.json", function(data) {
            var contenidoHTML = '';

            var profesor = data.find(p => p.nombre === profesorNombre);
            if (profesor) {
                contenidoHTML += '<div class="profesor-info">';
                contenidoHTML += '<h3>' + profesor.nombre + '</h3>';
                contenidoHTML += '<p><strong>Correo:</strong> ' + profesor.correo + '</p>';

                $.each(profesor.periodos_Inst, function(periodo, grupos) {
                    contenidoHTML += '<div><strong>Periodo:</strong> ' + periodo + '</div>';

                    $.each(grupos, function(idGrupo, infoGrupo) {
                        contenidoHTML += '<div class="grupo-info">';
                        contenidoHTML += '<h4>Grupo: ' + idGrupo + '</h4>';
                        contenidoHTML += '<p><strong>Carrera:</strong> ' + infoGrupo.Carrera + '</p>';
                        contenidoHTML += '<p><strong>Materia:</strong> ' + infoGrupo.Materia + '</p>';
                        contenidoHTML += '<p><strong>Semestre:</strong> ' + infoGrupo.Semestre + '</p>';
                        contenidoHTML += '<p><strong>Clave Asignatura:</strong> ' + infoGrupo.ClaveAsignatura + '</p>';
                        contenidoHTML += '<p><strong>Total Temas:</strong> ' + infoGrupo.totalTemas + '</p>';
                        contenidoHTML += '</div>';
                    });
                });

                contenidoHTML += '</div>';
            }

            $('.contenido').html(contenidoHTML);
        });
    });
});


$(document).ready(function() {
    $('a[p3]').click(function() {
        var profesorNombre = $(this).attr('p3'); 

        $.getJSON("I3.json", function(data) {
            var contenidoHTML = '';

            var profesor = data.find(p => p.nombre === profesorNombre);
            if (profesor) {
                contenidoHTML += '<div class="profesor-info">';
                contenidoHTML += '<h3>' + profesor.nombre + '</h3>';
                contenidoHTML += '<p><strong>Correo:</strong> ' + profesor.correo + '</p>';

                $.each(profesor.periodos_Inst, function(periodo, grupos) {
                    contenidoHTML += '<div><strong>Periodo:</strong> ' + periodo + '</div>';

                    $.each(grupos, function(idGrupo, infoGrupo) {
                        contenidoHTML += '<div class="grupo-info">';
                        contenidoHTML += '<h4>Grupo: ' + idGrupo + '</h4>';
                        contenidoHTML += '<p><strong>Carrera:</strong> ' + infoGrupo.Carrera + '</p>';
                        contenidoHTML += '<p><strong>Materia:</strong> ' + infoGrupo.Materia + '</p>';
                        contenidoHTML += '<p><strong>Semestre:</strong> ' + infoGrupo.Semestre + '</p>';
                        contenidoHTML += '<p><strong>Clave Asignatura:</strong> ' + infoGrupo.ClaveAsignatura + '</p>';
                        contenidoHTML += '<p><strong>Total Temas:</strong> ' + infoGrupo.totalTemas + '</p>';
                        contenidoHTML += '</div>';
                    });
                });

                contenidoHTML += '</div>';
            }

            $('.contenido').html(contenidoHTML);
        });
    });
});


$(document).ready(function() {
    $('a[p4]').click(function() {
        var profesorNombre = $(this).attr('p4'); 

        $.getJSON("I4.json", function(data) {
            var contenidoHTML = '';

            var profesor = data.find(p => p.nombre === profesorNombre);
            if (profesor) {
                contenidoHTML += '<div class="profesor-info">';
                contenidoHTML += '<h3>' + profesor.nombre + '</h3>';
                contenidoHTML += '<p><strong>Correo:</strong> ' + profesor.correo + '</p>';

                $.each(profesor.periodos_Inst, function(periodo, grupos) {
                    contenidoHTML += '<div><strong>Periodo:</strong> ' + periodo + '</div>';

                    $.each(grupos, function(idGrupo, infoGrupo) {
                        contenidoHTML += '<div class="grupo-info">';
                        contenidoHTML += '<h4>Grupo: ' + idGrupo + '</h4>';
                        contenidoHTML += '<p><strong>Carrera:</strong> ' + infoGrupo.Carrera + '</p>';
                        contenidoHTML += '<p><strong>Materia:</strong> ' + infoGrupo.Materia + '</p>';
                        contenidoHTML += '<p><strong>Semestre:</strong> ' + infoGrupo.Semestre + '</p>';
                        contenidoHTML += '<p><strong>Clave Asignatura:</strong> ' + infoGrupo.ClaveAsignatura + '</p>';
                        contenidoHTML += '<p><strong>Total Temas:</strong> ' + infoGrupo.totalTemas + '</p>';
                        contenidoHTML += '</div>';
                    });
                });

                contenidoHTML += '</div>';
            }

            $('.contenido').html(contenidoHTML);
        });
    });
});


$(document).ready(function() {
    $('a[p5]').click(function() {
        var profesorNombre = $(this).attr('p5'); 

        $.getJSON("I5.json", function(data) {
            var contenidoHTML = '';

            var profesor = data.find(p => p.nombre === profesorNombre);
            if (profesor) {
                contenidoHTML += '<div class="profesor-info">';
                contenidoHTML += '<h3>' + profesor.nombre + '</h3>';
                contenidoHTML += '<p><strong>Correo:</strong> ' + profesor.correo + '</p>';

                $.each(profesor.periodos_Inst, function(periodo, grupos) {
                    contenidoHTML += '<div><strong>Periodo:</strong> ' + periodo + '</div>';

                    $.each(grupos, function(idGrupo, infoGrupo) {
                        contenidoHTML += '<div class="grupo-info">';
                        contenidoHTML += '<h4>Grupo: ' + idGrupo + '</h4>';
                        contenidoHTML += '<p><strong>Carrera:</strong> ' + infoGrupo.Carrera + '</p>';
                        contenidoHTML += '<p><strong>Materia:</strong> ' + infoGrupo.Materia + '</p>';
                        contenidoHTML += '<p><strong>Semestre:</strong> ' + infoGrupo.Semestre + '</p>';
                        contenidoHTML += '<p><strong>Clave Asignatura:</strong> ' + infoGrupo.ClaveAsignatura + '</p>';
                        contenidoHTML += '<p><strong>Total Temas:</strong> ' + infoGrupo.totalTemas + '</p>';
                        contenidoHTML += '</div>';
                    });
                });

                contenidoHTML += '</div>';
            }

            $('.contenido').html(contenidoHTML);
        });
    });
});

$(document).ready(function() {
    $('a[p6]').click(function() {
        var profesorNombre = $(this).attr('p6'); 

        $.getJSON("I6.json", function(data) {
            var contenidoHTML = '';

            var profesor = data.find(p => p.nombre === profesorNombre);
            if (profesor) {
                contenidoHTML += '<div class="profesor-info">';
                contenidoHTML += '<h3>' + profesor.nombre + '</h3>';
                contenidoHTML += '<p><strong>Correo:</strong> ' + profesor.correo + '</p>';

                $.each(profesor.periodos_Inst, function(periodo, grupos) {
                    contenidoHTML += '<div><strong>Periodo:</strong> ' + periodo + '</div>';

                    $.each(grupos, function(idGrupo, infoGrupo) {
                        contenidoHTML += '<div class="grupo-info">';
                        contenidoHTML += '<h4>Grupo: ' + idGrupo + '</h4>';
                        contenidoHTML += '<p><strong>Carrera:</strong> ' + infoGrupo.Carrera + '</p>';
                        contenidoHTML += '<p><strong>Materia:</strong> ' + infoGrupo.Materia + '</p>';
                        contenidoHTML += '<p><strong>Semestre:</strong> ' + infoGrupo.Semestre + '</p>';
                        contenidoHTML += '<p><strong>Clave Asignatura:</strong> ' + infoGrupo.ClaveAsignatura + '</p>';
                        contenidoHTML += '<p><strong>Total Temas:</strong> ' + infoGrupo.totalTemas + '</p>';
                        contenidoHTML += '</div>';
                    });
                });

                contenidoHTML += '</div>';
            }

            $('.contenido').html(contenidoHTML);
        });
    });
});

$(document).ready(function() {
    $('a[p7]').click(function() {
        var profesorNombre = $(this).attr('p7'); 

        $.getJSON("I7.json", function(data) {
            var contenidoHTML = '';

            var profesor = data.find(p => p.nombre === profesorNombre);
            if (profesor) {
                contenidoHTML += '<div class="profesor-info">';
                contenidoHTML += '<h3>' + profesor.nombre + '</h3>';
                contenidoHTML += '<p><strong>Correo:</strong> ' + profesor.correo + '</p>';

                $.each(profesor.periodos_Inst, function(periodo, grupos) {
                    contenidoHTML += '<div><strong>Periodo:</strong> ' + periodo + '</div>';

                    $.each(grupos, function(idGrupo, infoGrupo) {
                        contenidoHTML += '<div class="grupo-info">';
                        contenidoHTML += '<h4>Grupo: ' + idGrupo + '</h4>';
                        contenidoHTML += '<p><strong>Carrera:</strong> ' + infoGrupo.Carrera + '</p>';
                        contenidoHTML += '<p><strong>Materia:</strong> ' + infoGrupo.Materia + '</p>';
                        contenidoHTML += '<p><strong>Semestre:</strong> ' + infoGrupo.Semestre + '</p>';
                        contenidoHTML += '<p><strong>Clave Asignatura:</strong> ' + infoGrupo.ClaveAsignatura + '</p>';
                        contenidoHTML += '<p><strong>Total Temas:</strong> ' + infoGrupo.totalTemas + '</p>';
                        contenidoHTML += '</div>';
                    });
                });

                contenidoHTML += '</div>';
            }

            $('.contenido').html(contenidoHTML);
        });
    });
});

$(document).ready(function() {
    $('a[p8]').click(function() {
        var profesorNombre = $(this).attr('p8'); 

        $.getJSON("I8.json", function(data) {
            var contenidoHTML = '';

            var profesor = data.find(p => p.nombre === profesorNombre);
            if (profesor) {
                contenidoHTML += '<div class="profesor-info">';
                contenidoHTML += '<h3>' + profesor.nombre + '</h3>';
                contenidoHTML += '<p><strong>Correo:</strong> ' + profesor.correo + '</p>';

                $.each(profesor.periodos_Inst, function(periodo, grupos) {
                    contenidoHTML += '<div><strong>Periodo:</strong> ' + periodo + '</div>';

                    $.each(grupos, function(idGrupo, infoGrupo) {
                        contenidoHTML += '<div class="grupo-info">';
                        contenidoHTML += '<h4>Grupo: ' + idGrupo + '</h4>';
                        contenidoHTML += '<p><strong>Carrera:</strong> ' + infoGrupo.Carrera + '</p>';
                        contenidoHTML += '<p><strong>Materia:</strong> ' + infoGrupo.Materia + '</p>';
                        contenidoHTML += '<p><strong>Semestre:</strong> ' + infoGrupo.Semestre + '</p>';
                        contenidoHTML += '<p><strong>Clave Asignatura:</strong> ' + infoGrupo.ClaveAsignatura + '</p>';
                        contenidoHTML += '<p><strong>Total Temas:</strong> ' + infoGrupo.totalTemas + '</p>';
                        contenidoHTML += '</div>';
                    });
                });

                contenidoHTML += '</div>';
            }

            $('.contenido').html(contenidoHTML);
        });
    });
});

$(document).ready(function() {
    $('a[p9]').click(function() {
        var profesorNombre = $(this).attr('p9'); 

        $.getJSON("I9.json", function(data) {
            var contenidoHTML = '';

            var profesor = data.find(p => p.nombre === profesorNombre);
            if (profesor) {
                contenidoHTML += '<div class="profesor-info">';
                contenidoHTML += '<h3>' + profesor.nombre + '</h3>';
                contenidoHTML += '<p><strong>Correo:</strong> ' + profesor.correo + '</p>';

                $.each(profesor.periodos_Inst, function(periodo, grupos) {
                    contenidoHTML += '<div><strong>Periodo:</strong> ' + periodo + '</div>';

                    $.each(grupos, function(idGrupo, infoGrupo) {
                        contenidoHTML += '<div class="grupo-info">';
                        contenidoHTML += '<h4>Grupo: ' + idGrupo + '</h4>';
                        contenidoHTML += '<p><strong>Carrera:</strong> ' + infoGrupo.Carrera + '</p>';
                        contenidoHTML += '<p><strong>Materia:</strong> ' + infoGrupo.Materia + '</p>';
                        contenidoHTML += '<p><strong>Semestre:</strong> ' + infoGrupo.Semestre + '</p>';
                        contenidoHTML += '<p><strong>Clave Asignatura:</strong> ' + infoGrupo.ClaveAsignatura + '</p>';
                        contenidoHTML += '<p><strong>Total Temas:</strong> ' + infoGrupo.totalTemas + '</p>';
                        contenidoHTML += '</div>';
                    });
                });

                contenidoHTML += '</div>';
            }

            $('.contenido').html(contenidoHTML);
        });
    });
});

$(document).ready(function() {
    $('a[p10]').click(function() {
        var profesorNombre = $(this).attr('p10'); 

        $.getJSON("I10.json", function(data) {
            var contenidoHTML = '';

            var profesor = data.find(p => p.nombre === profesorNombre);
            if (profesor) {
                contenidoHTML += '<div class="profesor-info">';
                contenidoHTML += '<h3>' + profesor.nombre + '</h3>';
                contenidoHTML += '<p><strong>Correo:</strong> ' + profesor.correo + '</p>';

                $.each(profesor.periodos_Inst, function(periodo, grupos) {
                    contenidoHTML += '<div><strong>Periodo:</strong> ' + periodo + '</div>';

                    $.each(grupos, function(idGrupo, infoGrupo) {
                        contenidoHTML += '<div class="grupo-info">';
                        contenidoHTML += '<h4>Grupo: ' + idGrupo + '</h4>';
                        contenidoHTML += '<p><strong>Carrera:</strong> ' + infoGrupo.Carrera + '</p>';
                        contenidoHTML += '<p><strong>Materia:</strong> ' + infoGrupo.Materia + '</p>';
                        contenidoHTML += '<p><strong>Semestre:</strong> ' + infoGrupo.Semestre + '</p>';
                        contenidoHTML += '<p><strong>Clave Asignatura:</strong> ' + infoGrupo.ClaveAsignatura + '</p>';
                        contenidoHTML += '<p><strong>Total Temas:</strong> ' + infoGrupo.totalTemas + '</p>';
                        contenidoHTML += '</div>';
                    });
                });

                contenidoHTML += '</div>';
            }

            $('.contenido').html(contenidoHTML);
        });
    });
});

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



<script>

alertify.success('<h2>Inicio correcto de usuario</h2>', 5);

</script>






</body>
</html>