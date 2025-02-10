<?php
require '../backend/db.php';
session_start();
$result = $conn->query("SELECT * FROM movies");
$movies = [];
while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}
    function generateStars($rating) {
        $starsCount = round($rating / 2); // Convierte de 1-10 a 1-5 estrellas
        return str_repeat('<i class="fas fa-star text-warning"></i>', $starsCount) .
            str_repeat('<i class="far fa-star text-warning"></i>', 5 - $starsCount);
    }
?>