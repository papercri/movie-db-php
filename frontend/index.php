<?php
    require("../backend/movies.php");
    session_start();
    $pageTitle = "Todas las peliculas";
    $pageDescription = "Todas las peliculas";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'header.php'; ?>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <main>
        <div class="container ">
            <h1><?php echo $pageTitle ?></h1>
            <div class="show-movies">
                <?php foreach ($movies as $movie): ?>
                <!-- Card de película -->
                    <div class="movie-card">
                        <img src=<?=$movie['poster'] ?> class="card-img-top" alt="<?= $movie['title'] ?>">
                        <div class="card-body">
                        <h5 class="card-title"><?= $movie['title'] ?> (<?= $movie['year'] ?>)</h5>
                            <p class="rating"><?= generateStars($movie['rating']) ?></p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#movieModal<?= $movie['id'] ?>" title="Ver más" >
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>
                <!-- Modal Details -->
                    <?php include 'movie_modal.php' ?>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</body>
</html>
