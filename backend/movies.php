<?php
    session_start();
    require("db.php");
    require("utils.php");

    //ordenar peliculas
    $order = isset($_GET['order']) ? $_GET['order'] : 'title';
    $direction = isset($_GET['direction']) ? $_GET['direction'] : 'ASC';

    $query = "SELECT movies.*, users.username FROM movies JOIN users ON movies.user_id = users.id ORDER BY $order $direction";
    $result = $conn->query($query);
    $movies = [];

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $movies[] = $row;
        }
    } 
?>