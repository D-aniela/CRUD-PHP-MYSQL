<?php

include("db.php");

if(isset($_POST['save_task'])){
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    $query = "INSERT INTO task(titulo, descripcion) VALUES ('$title', '$description')";
    $resultado = mysqli_query($conn, $query);

    if(!$resultado){
        die("Query Failed $consulta. " . mysqli_error($conn));
    }

    // Almacenar datos
    $_SESSION['message'] = 'Task Saved succesfully';
    $_SESSION['message_type'] = 'success';
    
    header("Location: index.php");
}

?>
