<?php

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = $id";
    
    $resultado = mysqli_query($conn, $query);

    // Si no existe el resultado
    if(!$resultado){
        die("Query Failed");
    }

    $_SESSION['message'] = "Task Removed Succesfully";
    $_SESSION['message_type'] = "danger";

    header("Location: index.php");
}

?>