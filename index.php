<?php 
        require 'BD/conexion.php';

        if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
        }

        if(isset($_POST['apellido'])){
            $apellido = $_POST['apellido'];
        }

        if(isset($_POST['edad'])){
            $edad = $_POST['edad'];
        }

    try{
         $sql = "INSERT INTO `ciudadano`(`nombre`,`apellido`,`edad`)VALUES('{$nombre}','{$apellido}','{$edad}'); ";
         $query = $conn->query($sql);

    }catch(Exception $e){
        echo  $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="contendor">
        <div class="contenido">
            <h1>Formulario</h1>
            <form class="formulario" action="index.php" method="post">
               
                <input type="text" name="nombre" placeholder="Nombre"><br>
                
                <input type="text" name="apellido" placeholder="Apellido"><br>
               
                <input type="number" name="edad" placeholder="Edad"><br>

                <input type="submit" value="Enviar"><br>
            </form><br>
            <div class="mensaje">
                <?php 
                    if($query){
                        echo    "<script>
                                    alert('Se Insertado el Dato Satisfactoriamente');
                                </script>";
                    }else{
                        echo "<script>
                                alert('Se Insertado el Dato Satisfactoriamente') 
                            </script>";
                        ;
                    }
                ?>
            </div>
        </div>
    </div>
    <table>
        <th>
            <tr>
               <td class="fondo">Nombre</td>
               <td class="fondo">Apellido</td>
               <td class="fondo">Edad</td>
            </tr>
        </th>
            <?php 
                $sql = "SELECT * FROM `ciudadano`";
                $consultar = mysqli_query($conn,$sql);
            ?>
        <tbody>
            <?php 
                while($row = mysqli_fetch_array($consultar)){?>
            <tr>
                <td>
                    <?php echo $row['nombre'] ?>
                </td>
                <td>
                    <?php echo $row['apellido'] ?>
                </td>
                <td>
                    <?php echo $row['edad'] ?>
                </td>
                <td class="enlace1"><a href="editar.php?id=<?php echo $row['id']?>">Modificar</a></td>
                <td class="enlace2"><a href="eliminar.php?id=<?php echo $row['id']?>">Eliminar</a></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</body>
</html>