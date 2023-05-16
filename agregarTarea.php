<?php
//Esta conexion es con PDO (PHP Data Objects)  es una extensión de PHP que proporciona una interfaz orientada a objetos para acceder y manipular bases de datos. 

try{
$conn = new PDO('mysql:host=localhost;dbname=to-do-list','root','');
}catch(PDOException $e){
    echo "Error de conexion:".$e->getMessage();
}

if(isset($_POST['id'])){
    $id=$_POST['id'];
    $completado=(isset($_POST['completado']))?1:0;

    $sql="UPDATE tareas SET completado=? WHERE id=?";
    $sentencia=$conn->prepare($sql);
    $sentencia->execute([$completado,$id]);

}

if(isset($_POST['agregar_tarea'])){
    $tarea=($_POST['tarea']);// comprobar si se esta captando la tarea = print_r($tarea);
   //esta sentencia sql inserta la tarea con el VALUE valor que me este dando el usuario
   $sql='INSERT INTO tareas (tarea) VALUE(?)';
   $sentencia= $conn->prepare($sql);
   $sentencia->execute([$tarea]);
}
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM tareas WHERE id=?";
    $sentencia=$conn->prepare($sql);
    $sentencia->execute([$id]);
}

$sql="SELECT * FROM tareas";
$registros=$conn->query($sql);


?>