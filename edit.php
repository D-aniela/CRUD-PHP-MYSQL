<?php

include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows(($resultado)) == 1) {
        $row = mysqli_fetch_array($resultado);
        $title = $row['titulo'];
        $description = $row['descripcion'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task set titulo = '$title', descripcion = '$description' WHERE id = '$id' ";
    mysqli_query($conn, $query);

    // Redireccionar al inicio
    $_SESSION['meesage'] = 'Task Updated Successfully';
    $_SESSION['meesage_type'] = 'info';
    header("Location: index.php");
    // echo $title;
    // echo $description;
    // echo $id;
}

?>

<?php
include("includes/header.php")
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <!-- Enviar los datos a edit.php a traves de la propiedad id enviado por el método POST -->
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update title">
                    </div>

                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" <?php echo $description; ?> placeholder="Update Description"></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php")
?>