<?php
    session_start();
    require("db.php");

    // Verificar si el usuario está logueado
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../frontend/login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];

    // Obtener películas del usuario logueado
    $sql = "SELECT u.username, m.* FROM movies m 
            JOIN users u ON m.user_id = u.id
            WHERE m.user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $movies = $result->fetch_all(MYSQLI_ASSOC);

    function generateStars($rating) {
        $starsCount = round($rating / 2); 
        return str_repeat('<i class="fas fa-star text-warning"></i>', $starsCount) .
            str_repeat('<i class="far fa-star text-warning"></i>', 5 - $starsCount);
    }
?>

</html>
