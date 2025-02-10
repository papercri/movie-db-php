<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">MovieDB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <?php if(isset($_SESSION['username'] )){
                    echo '<li class="nav-item">
                            <a class="nav-link" href="user.php">Mis Películas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_movie.php">Añadir Película</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../backend/logout.php">Cerrar sessión</a>
                        </li>';
                    }
                ?>
                <?php if(!isset($_SESSION['username'] )){
                    echo '<li class="nav-item">
                        <a class="nav-link" href="register.php">Registrate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Iniciar Sesión</a>
                        </li>';
                    }
                ?>

            </ul>
            <!-- <form class="d-flex" action="search.php" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Buscar películas..." aria-label="Buscar">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form> -->
        </div>
        <div class="user-logged">Hola <span class="text-capitalize"><?= isset($_SESSION['username'])?$_SESSION["username"]:"User"; ?></span></div>
    </div>
</nav>
