<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo "Sesión no iniciada. Redirigiendo a login...";
    header("refresh:3;url=login.php"); 
    exit();
}

//echo "Usuario logueado, ID: " . $_SESSION['user_id'];


$user_id = $_SESSION['user_id'];

if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {

        $title = $_POST['title'];
        $year = $_POST['year'];
        $genre = $_POST['genre'];
        $description = $_POST['description'];
        $rating = $_POST['rating'];
        $user_id = $_SESSION["user_id"]; 
        $poster = $_POST['poster'];

        $sql = "INSERT INTO movies (user_id, title, year, genre, description, rating, poster) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("isissis", $user_id, $title, $year, $genre, $description, $rating, $poster);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error al añadir la película.";
        }
    
        $stmt->close();
    }
    
    

?>