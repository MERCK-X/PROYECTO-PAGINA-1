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


</head>
<body>
    
    <button onclick="cerrarsesion()">x</button> 

    <script>
        history.pushState({},'',"Login.html");
        function cerrarsesion()
        {
            location.href="cerrarsesion.php";
        }
</script>

</body>


</html>