<?php
session_start();
require '../backend/user_movies.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/styles.css">

    
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
        <h2>Mis Películas</h2>
        <div class="row">
            <?php foreach ($movies as $movie): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="<?= $movie['poster'] ?>" class="card-img-top" alt="<?= $movie['title'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $movie['title'] ?> (<?= $movie['year'] ?>)</h5>
                            <p class="card-text"><?= substr($movie['description'], 0, 100) ?>...</p>
                            <p class="rating"><?= generateStars($movie['rating']) ?></p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#movieModal<?= $movie['id'] ?>">
                                Ver más
                            </button>
                            <a href="edit_movie.php?id=<?= $movie['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="../backend/delete_movie.php?id=<?= $movie['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar esta película?');">Eliminar</a>
                        </div>
                    </div>
                </div>

                <!-- Modal Details -->

                <div class="modal fade" id="movieModal<?= $movie['id'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $movie['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel<?= $movie['id'] ?>"><?= $movie['title'] ?> (<?= $movie['year'] ?>)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?= $movie['poster'] ?>" class="img-fluid mb-3" alt="<?= $movie['title'] ?>">
                                    <p><strong>Género:</strong> <?= $movie['genre'] ?></p>
                                    <p><strong>Descripción:</strong> <?= $movie['description'] ?></p>
                                    <p><strong>Rating:</strong> <?= generateStars($movie['rating']) ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>