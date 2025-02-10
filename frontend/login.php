<?php 
    session_start();
    require("../backend/db.php");
    require("../backend/utils.php");
    $pageTitle = "Iniciar sessión";
    $pageDescription = "Iniciar sessión";

$error_message = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = validateTextInput($_POST["username"]);
    $password = $_POST["password"];

    // Preparar la consulta
    $sqlQuery = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sqlQuery);

    mysqli_stmt_bind_param($stmt, "s", $username);

    if (!mysqli_stmt_execute($stmt)) {
        $error_message = "Error: " . mysqli_error($conn); // Capturar el error de ejecución de la consulta
    } else {
        // Obtener resultados de la consulta
        $results = mysqli_stmt_get_result($stmt);
        $arrayResults = mysqli_fetch_assoc($results);

        if ($arrayResults) {
            if (password_verify($password, $arrayResults["password"])) {
                $_SESSION["username"] = $username;
                $_SESSION["user_id"] = $arrayResults["id"]; 
                header("Location: ../frontend/index.php");
            } else {
                $error_message = "El password no es correcto"; // Error de contraseña incorrecta
            }
        } else {
            $error_message = "Error: No se encontró el usuario"; // Si no se encuentra el usuario
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<?php include 'header.php'; ?>  
</head>
<body>
<?php include 'navbar.php'; ?>
    <main>
    <div class="container ">
    <h1><?php echo $pageTitle ?></h1>
    <div class="form-container">
        
        <form action="" method="POST">
            <label for="username">User name</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit" class="btn btn-primary w100">Entrar</button>
        </form>
    </div>
    </div>
    </main>
    
    <!-- Modal de error -->
    <?php if (!empty($error_message)): ?>
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Error</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo htmlspecialchars($error_message); ?> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Script para mostrar la modal si hay error -->
    <script>
        <?php if (!empty($error_message)): ?>
            var myModal = new bootstrap.Modal(document.getElementById('errorModal'), {
                keyboard: false
            });
            myModal.show();
        <?php endif; ?>
    </script>
</body>
</html>
