<?php
require("db.php");
session_start();
$result = $conn->query("SELECT movies.*, users.username 
    FROM movies
    JOIN users ON movies.user_id = users.id");
$movies = [];
while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}
    function generateStars($rating) {
        $starsCount = round($rating / 2); 
        return str_repeat('<i class="fas fa-star text-warning"></i>', $starsCount) .
            str_repeat('<i class="far fa-star text-warning"></i>', 5 - $starsCount);
    }
?>