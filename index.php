<?php
 include_once 'crud.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Ejemplo Crud</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body >
    
        <br>
        <div id="form">  
            <form method="post">
                <table width="100%" border="1" cellpading="15">
                    <tr>
                        <td>
                            <input type="text" name="año" placeholder="Año" value="<?php if(isset($_GET['edit'])) echo $getROW['Año']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>   
                            <input type="text" name="autor" placeholder="Autor" value="<?php if(isset($_GET['edit'])) echo $getROW['Autor']; ?>"> 
                        </td>
                    </tr>
                    <tr>
                        <td>   
                            <input type="text" name="titulo" placeholder="Titulo" value="<?php if(isset($_GET['edit'])) echo $getROW['Titulo']; ?>"> 
                        </td>
                    </tr>
                    <tr>
                        <td>   
                            <input type="text" name="url" placeholder="Url" value="<?php if(isset($_GET['edit'])) echo $getROW['Url']; ?>"> 
                        </td>
                    </tr>
                    <tr>
                        <td>   
                            <input type="text" name="especialidad" placeholder="Especialidad" value="<?php if(isset($_GET['edit'])) echo $getROW['Especialidad']; ?>"> 
                        </td>
                    </tr>
                    <tr>
                        <td>   
                            <input type="text" name="editorial" placeholder="Editorial" value="<?php if(isset($_GET['edit'])) echo $getROW['Editorial']; ?>"> 
                        </td>
                    </tr>
                    <tr>
                        <td>   
                            <?php
                                if(isset($_GET['edit'])){
                                    ?>
                                    <button type="submit" name="update">Editar</button>
                                    <?php 
                                }else{
                                    ?>
                                    <button type="submit" name="save">Registrar</button>
                                    <?php
                                }
                            ?>
                        </td>   
                    </tr>
                </table>
            </form>

            <br><br>

            <table width="100%" border="1" cellpading="15" align ="center" >
            <tr>
                        <td> Año</td>
                        <td> Autor</td>
                        <td> Titulo</td>
                        <td> Especialidad</td>
                        <td> Editorial</td>
                        <td colspan ="3"> 
                            Mantenimiento
                        </td>
                        
                    </tr>
                <?php
                    $res = $MySQLiconn->query("SELECT * FROM biblioteca");
                    while($row = $res->fetch_array()){
                ?>  
                    
                    <tr>
                        <td> <?php echo $row['Año']; ?></td>
                        <td> <?php echo $row['Autor']; ?></td>
                        <td> <?php echo $row['Titulo']; ?></td>
                        <td> <?php echo $row['Especialidad']; ?></td>
                        <td> <?php echo $row['Editorial']; ?></td>
                        <td> 
                            <a target="_blank"  href=" <?php  echo $row['Url'];?>" >Leer</a>
                        </td>
                        <td> 
                            <a href="?edit= <?php echo $row['id'];?>" 
                            onclick="return confirm('Confirmar edicion')">Editar</a>
                        </td>
                        <td> 
                            <a href="?del=<?php echo $row['id'];?>" 
                            onclick="return confirm('Confirmar eliminacion')">Eliminar</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table> 
        </div>
    
</body>
</html>