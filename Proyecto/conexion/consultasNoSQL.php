<?php
    session_start();
    require_once 'conexionNoSQL.php';
    $connNoSQL = connNoSQL::singleton();

    if(isset($_POST['accion'])  && !empty($_POST['accion']))
    {
        $action = $_POST['accion'];
        switch($action)
        {
            //------------------------------------------------------------------------------------------
            case 'consultodo':    
                $tema = $connNoSQL->consultaColeccion("Rubricas");

                if(isset($tema))
                {
                    $t = $tema;
                    echo json_encode($t);
                }
                else
                {
                    echo json_encode("ok");
                }             
            break;

            //------------------------------------------------------------------------------------------
            case 'buscarpornombre':
                $nombre = $_POST['nombre'];
                
                $filtro = ["nombre" => $nombre];
                $tema = $connNoSQL->consultaFiltrada("Rubricas", $filtro);

                if (!empty($tema)) 
                {
                    echo json_encode($tema);
                } 
                else 
                {
                    echo json_encode("no");
                }
            break;
            //------------------------------------------------------------------------------------------
            case 'buscarporcorreo':
                $correo = $_POST['correo'];

                $filtro = ["correo" => $correo];
                $tema = $connNoSQL->consultaFiltrada("Rubricas", $filtro);

                if (!empty($tema)) 
                {
                    echo json_encode($tema);
                } 
                else 
                {
                    echo json_encode("no");
                }
            break;
        }
    }
?>