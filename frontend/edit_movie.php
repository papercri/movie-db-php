<?php
    session_start();
    require("../backend/edit_movie.php");
    $pageTitle = "Editar Película";
    $pageDescription = "Editar Película";

    
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include 'header.php'; ?>  
</head>
<body>
<?php include 'navbar.php'; ?>
    <main>  
    <div class="container form-container">
        <h1><?php echo $pageTitle ?></h1>
        <form method="POST" class="w80" action="">
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
</body>
</html>
