<?php
    session_start();
    require("db.php");

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../frontend/login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $movie_id = $_GET['id'] ?? null;

    if (!$movie_id) {
        echo "Película no encontrada.";
        exit();
    }

    // Eliminar la película solo si pertenece al usuario
    $sql = "DELETE FROM movies WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $movie_id, $user_id);

    if ($stmt->execute()) {
        header("Location: ../frontend/user.php");
        exit();
    } else {
        echo "Error al eliminar la película.";
    }
?>
