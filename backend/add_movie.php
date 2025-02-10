<?php
include 'db.php';

$user_id = $_GET['id'];

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];

    // Manejo de la imagen (poster)
    $poster_name = $_FILES['poster']['name'];
    $poster_tmp = $_FILES['poster']['tmp_name'];
    $poster_path = '../public/images/' . basename($poster_name);
    move_uploaded_file($poster_tmp, $poster_path);

    // Inserta la película en la base de datos
    $sql = "INSERT INTO movies (user_id, title, year, genre, description, rating, poster) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("issssss", $user_id, $title, $year, $genre, $description, $rating, $poster_path);
        if ($stmt->execute()) {
            echo "Película añadida exitosamente!";
        } else {
            echo "Error al añadir la película.";
        }
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta.";
    }
}
?>