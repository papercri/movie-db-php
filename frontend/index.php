<?php
require '../backend/db.php';
session_start();
$result = $conn->query("SELECT * FROM movies");
$movies = [];
while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Películas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <img src="../public/images/<?= $movie['image'] ?>" class="card-img-top" alt="<?= $movie['title'] ?>">
                        <div class="info">
                            <h3><?= $movie['title'] ?> (<?= $movie['year'] ?>)</h3>
                            <p><?= $movie['description'] ?></p>
                            <p class="rating">⭐ <?= $movie['rating'] ?></p>
                            <a href="movie.php?id=<?= $movie['id'] ?>" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>
