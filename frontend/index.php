<?php
    session_start();
    require("../backend/movies.php");
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

            <!-- Select para ordenar peliculas -->
            <form method="GET" action="" class="">
                <div class="order-select">
                    <div>
                        <label for="order" class="form-label">Ordenar por:</label>
                        <select name="order" id="order" class="form-select form-search" onchange="this.form.submit()">
                            <option value="title" <?= ($order == 'title') ? 'selected' : '' ?>>Nombre</option>
                            <option value="rating" <?= ($order == 'rating') ? 'selected' : '' ?>>Rating</option>
                            <option value="year" <?= ($order == 'year') ? 'selected' : '' ?>>Año</option>
                        </select>
                    </div>
                    <div >
                        <label for="direction" class="form-label">Dirección:</label>
                        <select name="direction" id="direction" class="form-select form-search" onchange="this.form.submit()">
                            <option value="ASC" <?= ($direction == 'ASC') ? 'selected' : '' ?>>Ascendente</option>
                            <option value="DESC" <?= ($direction == 'DESC') ? 'selected' : '' ?>>Descendente</option>
                        </select>
                    </div>
                </div>
            </form>
            
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
