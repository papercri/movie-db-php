<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">MovieDB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
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
                <!-- Search Form -->
                <form action="search.php" method="GET" class="search-form">
                    <div class="input-group">
                        <input type="text" name="title" placeholder="Buscar película..." class="form-search">
                        <button type="submit" class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>

            </ul>
        </div>
        <!-- Hola Usuario -->
        <div class="user-logged">Hola <span class="text-capitalize"><?= isset($_SESSION['username'])?$_SESSION["username"]:"User"; ?></span></div>
    </div>
</nav>
