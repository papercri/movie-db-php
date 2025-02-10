<?php
session_start();
include 'db.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Verificar si hay un ID de película en la URL
if (!isset($_GET['id'])) {
    echo "Película no encontrada.";
    exit();
}

$movie_id = $_GET['id'];

// Obtener la película
$sql = "SELECT * FROM movies WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $movie_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$movie = $result->fetch_assoc();

if (!$movie) {
    echo "No tienes permiso para editar esta película.";
    exit();
}

// Si el formulario se envió, actualizar la película
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $poster = $_POST['poster'];

    $sql = "UPDATE movies SET title=?, year=?, genre=?, description=?, rating=?, poster=? WHERE id=? AND user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissisii", $title, $year, $genre, $description, $rating, $poster, $movie_id, $user_id);

    if ($stmt->execute()) {
        header("Location: ../frontend/user.php");
        exit();
    } else {
        echo "Error al actualizar la película.";
    }
}
?>
