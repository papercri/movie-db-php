<?php
session_start();
require '../backend/movies.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                echo "<p>No se encontraron películas con el título '$title'.</p>";
            }
            }
            else {
                echo "<p>Por favor, ingrese un título para buscar.</p>";
            }
        ?>
    
    </div>
   
    </main>

   
</body>
</html>