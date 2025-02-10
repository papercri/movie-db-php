<?php
    session_start();
    require("../backend/user_movies.php");
    $pageTitle = "Mis Películas";
    $pageDescription = "Mis Películas";
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
                    <div class="movie-card">
                        <img src="<?= $movie['poster'] ?>" class="card-img-top" alt="<?= $movie['title'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $movie['title'] ?> (<?= $movie['year'] ?>)</h5>
                            <p class="card-text"><?= substr($movie['description'], 0, 100) ?>...</p>
                            <p class="rating"><?= generateStars($movie['rating']) ?></p>
                            <div class="buttons">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#movieModal<?= $movie['id'] ?>" title="Ver más" >
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <a href="edit_movie.php?id=<?= $movie['id'] ?>" class="btn btn-warning" title="Editar" >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="../backend/delete_movie.php?id=<?= $movie['id'] ?>" title="Eliminar" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar esta película?');">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
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