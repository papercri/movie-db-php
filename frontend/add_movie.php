<?php
session_start();
require '../backend/add_movie.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir pelicula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <main>
    <div class="container form-container ">
        <h1>Añadir pelicula</h1>
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