<?php
require("db.php");
require("utils.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        
        $userName = validateTextInput($_POST["username"]);
        $email = validateEmail($_POST["email"]);
        $password = validateAndHashPassword($_POST["password"]);
        if (!$email) {
            die("El formato del email no es valido");
        };

        if (!$password) {
            die("<script> 
                    alert('Password inválido. Debe tener al menos:\\n\\n- 4 caracteres\\n- Una letra mayúscula\\n- Una letra minúscula\\n- Un número\\n- Un carácter especial');
                </script>");
        };

        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $query);
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        
        if (mysqli_stmt_execute($stmt)) {
            
            $result = mysqli_stmt_get_result($stmt);
   
            if (mysqli_num_rows($result) > 0) {
                mysqli_stmt_close($stmt);
                echo "<script> alert('El nombre de usuario ya existe. Por favor, elige otro.') </script>";
            } else {
                $sqlQuery = "INSERT INTO users (userName, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sqlQuery);

                mysqli_stmt_bind_param($stmt, "sss",  $userName, $email, $password);
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_close($stmt);
                    
                    echo "<script>
                            alert('Welcome " . $userName . "');
                            window.location.href='login.php';
                          </script>";
                } else {

                    echo "<script> alert('Error ejecutando la declaración de la query: " . mysqli_error($conn) . "') </script>";
                }
            }
        } else {
      
            echo "<script> alert('Error ejecutando la consulta: " . mysqli_error($conn) . "') </script>";
           
        }
    } else {

        echo "<script> alert('Deben rellenarse todos los campos') </script>";
    };
    mysqli_close($conn);
}
?>
