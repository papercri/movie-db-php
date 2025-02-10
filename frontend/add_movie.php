<?php
    session_start();
    require("../backend/add_movie.php");
    $pageTitle = "Añadir pelicula";
    $pageDescription = "Añadir pelicula";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'header.php'; ?>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <main>
    <div class="container form-container ">
        <h1><?php echo $pageTitle ?></h1>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
        }
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>
        <form action="" method="POST" class="w80">
            <div class="form-group">
                <label for="title">Título de la Película:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="year">Año:</label>
                <input type="number" id="year" name="year" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="genre">Género:</label>
                <input type="text" id="genre" name="genre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="director">Director:</label>
                <input type="text" id="director" name="director" class="form-control" >
            </div>
            <div class="form-group">
                <label for="actors">Actores:</label>
                <input type="text" id="actors" name="actors" class="form-control" >
            </div>
            <div class="form-group">
                <label for="country">País:</label>
                <input type="text" id="country" name="country" class="form-control" >
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="rating">Calificación (0-5):</label>
                <input type="number" id="rating" name="rating" class="form-control" min="0" max="5" required>
            </div>
            
            <div class="form-group">
                <label for="poster">URL de la imagen:</label>
                <input type="text" id="poster" name="poster" class="form-control" >
            </div>
            <div class="form-group ">
                <button type="submit" name="submit" class="btn btn-primary 
                ">Añadir Película</button>
            </div>
        </form>
        </div>
    </main>
</body>
</html>