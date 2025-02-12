<?php
    session_start();
    require("../backend/movies.php");
    $pageTitle = "Buscar";
    $pageDescription = "Buscar";
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
        <?php
    
        if (isset($_GET['title'])) {
            $title = $_GET['title'];

            $title = mysqli_real_escape_string($conn, $title);

            $sql = "SELECT u.username, m.* 
                FROM movies m
                JOIN users u ON m.user_id = u.id
                WHERE m.title LIKE ?";
            $stmt = $conn->prepare($sql);
            $searchTerm = "%" . $title . "%"; 
            $stmt->bind_param("s", $searchTerm);
            $stmt->execute();
            $result = $stmt->get_result();

            // Comprobar si hay resultados
            if ($result->num_rows > 0) {
                echo "<h1>Resultados para '$title':</h1>";
                echo "<ul>";
                while ($movie = $result->fetch_assoc()) {
                    echo "<li>" . 
                    "<a href=\"#\" data-bs-toggle=\"modal\" data-bs-target='#movieModal" .  $movie['id'] . "'><strong>" . htmlspecialchars($movie['title']) . "</strong> (" . $movie['year'] . ")" . 
                    "</a></li>";
                     include 'movie_modal.php';
                }
                echo "</ul>" ;
            } else {
                echo "<p><br>No se encontraron películas con el título '$title'.</p>";
            }
            }
            else {
                echo "<p><br>Por favor, ingrese un título para buscar.</p>";
            }
        ?>
    
    </div>
   
    </main>

   
</body>
</html>