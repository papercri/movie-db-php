<?php
session_start();
require '../backend/edit_movie.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
<?php include 'navbar.php'; ?>
    <main>  
    <div class="container form-container">
        <h1>Editar Película</h1>
        <form method="POST" class="w80">
            <div class="form-group">
                <label class="form-label">Título</label>
                <input type="text" name="title" class="form-control" value="<?= $movie['title'] ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Año</label>
                <input type="number" name="year" class="form-control" value="<?= $movie['year'] ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Género</label>
                <input type="text" name="genre" class="form-control" value="<?= $movie['genre'] ?>" required>
            </div>
            <div class="form-group">
                <label for="director">Director:</label>
                <input type="text" id="director" name="director" class="form-control"  value="<?= $movie['director'] ?>">
            </div>
            <div class="form-group">
                <label for="actors">Actores:</label>
                <input type="text" id="actors" name="actors" class="form-control" value="<?= $movie['actors'] ?>">
            </div>
            <div class="form-group">
                <label for="country">País:</label>
                <input type="text" id="country" name="country" class="form-control" value="<?= $movie['country'] ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Descripción</label>
                <textarea name="description" class="form-control" required><?= $movie['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Calificación (0-5):</label>
                <input type="number" step="0.1" name="rating" class="form-control" value="<?= $movie['rating'] ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">URL de la imagen:</label>
                <input type="text" name="poster" class="form-control" value="<?= $movie['poster'] ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="user.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
