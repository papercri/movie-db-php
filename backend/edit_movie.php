<?php
session_start();
require("db.php");
require("utils.php");

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
    $title = validateTextInput($_POST['title']);
    $year = $_POST['year'];
    $genre = validateTextInput($_POST['genre']);
    $description = validateTextInput($_POST['description']);
    $rating = $_POST['rating'];
    $user_id = $_SESSION["user_id"]; 
    $poster = validateTextInput($_POST['poster']);
    $director = validateTextInput($_POST['director']);
    $actors = validateTextInput($_POST['actors']);
    $country = validateTextInput($_POST['country']);

    $sql = "UPDATE movies SET title=?, year=?, genre=?, description=?, rating=?, director=?, actors=?, country=?, poster=? WHERE id=? AND user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sississssii", $title, $year, $genre, $description, $rating, $director, $actors, $country, $poster, $movie_id, $user_id);

    if ($stmt->execute()) {
        header("Location: ../frontend/user.php");
        exit();
    } else {
        echo "Error al actualizar la película.";
    }
}
?>
