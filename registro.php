<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta mochileros</title>
    <style type="text/css">
     
      table {
        border: solid 2px #7e7c7c;
        border-collapse: collapse;
                     
      }
     
      th, h1 {
        background-color: #edf797;
      }

      td,
      th {
        border: solid 1px #7e7c7c;
        padding: 2px;
        text-align: center;
      }


    </style>
</head>
<body>
    
</body>
</html>
<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

//conectamos a la base de datos
$connection = mysqli_connect($host,$user,$pass);
//hacemos llamado al input de formulario
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$numero = $_POST["numero"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];

//verificamos la conexión a la base de datos
if(!$connection)
        {
            echo "No se ha podido conectar con el servidor".mysql_error();
        }
    else
        {
            echo "<b><h3>Hemos conectado al servidor</h3></b>";

        }
        //indicamos el nombre de la base de datos
        $datab = "mochileros";
        //indicamos seleccionar a la base de datos
        $db = mysqli_select_db($connection,$datab);
        if(!$db)
        {
        echo "No se ha podido encontrar la tabla";

        }
        else
        {
        echo "<h3>Tabla seleccionada:</h3>";
        }
        if(!empty($nombres)){//insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
        $instruccion_SQL = "INSERT INTO usuarios (nombres, apellidos, numero, email, mensaje)
                             VALUES ('$nombres','$apellidos','$numero','$email','$mensaje')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        $consulta = "SELECT * FROM usuarios";
      }
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
echo "<table>";
echo "<tr>";
echo "<th><h1>id</th></h1>";
echo "<th><h1>Nombres</th></h1>";
echo "<th><h1>Apellidos</th></h1>";
echo "<th><h1>Numero</th></h1>";
echo "<th><h1>Email</th></h1>";
echo "<th><h1>Mensaje</th></h1>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['IDusuario']. "</td></h2>";
    echo "<td><h2>" . $colum['nombres']. "</td></h2>";
    echo "<td><h2>" . $colum['apellidos'] . "</td></h2>";
    echo "<td><h2>" . $colum['numero'] . "</td></h2>";
    echo "<td><h2>" . $colum['email'] . "</td></h2>";
    echo "<td><h2>" . $colum['mensaje'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="main.html"> Volver Atrás</a>';


?>

