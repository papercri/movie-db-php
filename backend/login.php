<?php 
session_start();
require("db.php");
require("utils.php");

if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {
    
    $username = validateTextInput($_POST["username"]) ;
    $password = $_POST["password"];

    // prepare statement
    $sqlQuery = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sqlQuery);

    mysqli_stmt_bind_param($stmt, "s", $username);

    if ( !mysqli_stmt_execute($stmt) ) {
        echo "Error: " . mysqli_error($conn);
    }else{
        // Resultados de la query en formato objeto
        $results = mysqli_stmt_get_result($stmt);

        $arrayResults = mysqli_fetch_assoc($results);

        if ( $arrayResults ) {
            if ( password_verify($password, $arrayResults["password"]) ) {

                $_SESSION["username"] = $username;
                header("Location: ../frontend/index.php");
            }else{
                echo "El password no es correcto";
            }

        }else{
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>