<?php
require("db.php");
require("utils.php");
session_start();

$result = $conn->query("SELECT movies.*, users.username 
    FROM movies
    JOIN users ON movies.user_id = users.id");
$movies = [];
while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}
  
?>