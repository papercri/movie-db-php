<?php
require '../backend/db.php';
session_start();
$result = $conn->query("SELECT * FROM movies");
$movies = [];
while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}
    function generateStars($rating) {
        $starsCount = round($rating / 2); // Convierte de 1-10 a 1-5 estrellas
        return str_repeat('<i class="fas fa-star text-warning"></i>', $starsCount) .
            str_repeat('<i class="far fa-star text-warning"></i>', 5 - $starsCount);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Películas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    
    <div class="container mt-4">
        <!-- Fila de tarjetas de películas -->
        <div class="row">
            <?php foreach ($movies as $movie): ?>
                <div class="col-md-4 mb-3">
                    <!-- Tarjeta de película -->
                    <div class="movie-card">
                        <img src=<?=$movie['poster'] ?> class="card-img-top" alt="<?= $movie['title'] ?>">
                        <div class="info">
                            <h3><?= $movie['title'] ?> (<?= $movie['year'] ?>)</h3>
                      
                            <p class="rating"><?= generateStars($movie['rating']) ?></p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#movieModal<?= $movie['id'] ?>">
                                Ver más
                            </button>
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
                                <p><strong>Rating:</strong>  <?= generateStars($movie['rating']) ?></p>
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
