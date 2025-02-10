<?php
require("db.php");
require("utils.php");
session_start();
 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Se comprueba que todos los (name, username, email y password) no estén vacíos
    if (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        
        // Se sanitizan y validan los inputs utilizando funciones definidas en utils.php

        // Valida y limpia el nombre y el usuario
        
        $userName = validateTextInput($_POST["username"]);
        
        // Valida que el email tenga un formato correcto; en caso contrario, la función devuelve false
        $email = validateEmail($_POST["email"]);
        
        // Valida que el password cumpla con los requisitos y lo hashea; si no, devuelve false
        $password = validateAndHashPassword($_POST["password"]);

        // Si el email no es válido, se termina la ejecución del script mostrando un mensaje de error
        if (!$email) {
            die("El formato del email no es valido");
        };

        // Si el password es invalido se termina el script
        if (!$password) {
            die("<p></p>Password inválido. Debe tener al menos <ul><li>4 caracteres</li> <li>Una letra mayuscula.</li><li>Una letra minuscula.</li>  <li>Un numero</li><li>Un carácter especial</li> </ul></p>");
        };

        // Se prepara una consulta SQL para verificar que el nombre de usuario no exista ya en la base de datos
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $query);
        
        // Se vincula el parámetro del nombre de usuario en la consulta preparada
        mysqli_stmt_bind_param($stmt, "s", $email);
        
        // Se ejecuta la consulta preparada
        if (mysqli_stmt_execute($stmt)) {
            
            // Se obtiene el resultado de la consulta
            $result = mysqli_stmt_get_result($stmt);
            
            // Si se encontró algún registro, significa que el nombre de usuario ya existe
            if (mysqli_num_rows($result) > 0) {
                mysqli_stmt_close($stmt);
                echo "El nombre de usuario ya existe. Por favor, elige otro.";
            } else {
                // Si el usuario no existe ya en la base de datos, se procede a insertar el nuevo usuario en la base de datos

                // Se prepara la consulta SQL de inserción
                $sqlQuery = "INSERT INTO users (userName, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sqlQuery);

                // Se vinculan los parámetros correspondientes a cada campo. La "s" indica que todos son strings.
                mysqli_stmt_bind_param($stmt, "sss",  $userName, $email, $password);

                // Se ejecuta la consulta preparada de inserción
                if (mysqli_stmt_execute($stmt)) {

                    // Se cierra la declaración preparada
                    mysqli_stmt_close($stmt);
                    
                    // Se muestra un mensaje de bienvenida y se redirige al usuario a la página de login utilizando JavaScript
                    echo "<script>
                            alert('Welcome " . $userName . "');
                            window.location.href='login.php';
                          </script>";
                } else {
                    // En caso de error en la ejecución de la consulta de inserción, se muestra el error obtenido de la base de datos
                    echo "Error ejecutando la declaración de la query: " . mysqli_error($conn);
                }
            }
        } else {
            // Si ocurre un error al ejecutar la consulta para verificar el usuario, se muestra el error
            echo "Error ejecutando la consulta: " . mysqli_error($conn);
        }
    } else {
        // Si no se han rellenado todos los campos requeridos, se informa al usuario
        echo "Deben rellenarse todos los campos";
    };

    // Se cierra la conexión a la base de datos
    mysqli_close($conn);
}
?>
