<?php
include_once 'db.php';

/*codigo para insertar datos*/ 
if(isset($_POST['save'])){
    $año = $MySQLiconn->real_escape_string($_POST['año']);
    $autor = $MySQLiconn->real_escape_string($_POST['autor']);
    $titulo = $MySQLiconn->real_escape_string($_POST['titulo']);
    $url = $MySQLiconn->real_escape_string($_POST['url']);
    $especialidad = $MySQLiconn->real_escape_string($_POST['especialidad']);
    $editorial = $MySQLiconn->real_escape_string($_POST['editorial']);

    $SQL = $MySQLiconn->query("INSERT INTO biblioteca(año,autor,titulo,url,especialidad,editorial) VALUES ('$año','$autor','$titulo','$url','$especialidad','$editorial')");
    if(!$SQL){
        echo $MySQLiconn->error;
    }
}
/*codigo para insertar datos */

/*codigo para eliminar datos */
if(isset($_GET['del'])){
    $SQL = $MySQLiconn->query("DELETE FROM biblioteca WHERE id =" .$_GET['del']);
    header("Location: index.php");
}
/*codigo para eliminar datos */

/*codigo para editar datos */
if(isset($_GET['edit'])){
    $SQL = $MySQLiconn->query("SELECT * FROM biblioteca WHERE id=".$_GET['edit']);
    $getROW = $SQL->fetch_array();
}
if(isset($_POST['update'])){

    $SQL=$MySQLiconn->query("UPDATE biblioteca SET año='".$_POST['año']."', autor='".$_POST['autor']."', titulo='".$_POST['titulo']."', url='".$_POST['url']."', especialidad='".$_POST['especialidad']."', editorial='".$_POST['editorial']."' WHERE id=".$_GET['edit']);

    header("Location: index.php");
}
/*codigo para editar datos */

