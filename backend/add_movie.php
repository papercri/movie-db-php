<?php
    session_start();
    require("db.php");
    require("utils.php");

    if (!isset($_SESSION['user_id'])) {
        echo "Sesión no iniciada. Redirigiendo a login...";
        header("refresh:3;url=login.php"); 
        exit();
    }

    //echo "Usuario logueado, ID: " . $_SESSION['user_id'];

    $user_id = $_SESSION['user_id'];

    if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {
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

        $sql = "INSERT INTO movies (user_id, title, year, genre, description, rating, poster, director, actors, country) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("isississss", $user_id, $title, $year, $genre, $description, $rating, $poster, $director, $actors, $country);

        if ($stmt->execute()) {
            header("Location: ../frontend/index.php");
            exit();
        } else {
            echo "Error al añadir la película.";
        }

        $stmt->close();
    }
    
?>