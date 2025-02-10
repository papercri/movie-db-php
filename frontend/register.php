<?php
    session_start();
    require("../backend/register.php");
    $pageTitle = "Registro de Usuario";
    $pageDescription = "Registro de Usuario";
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
            <form method="POST" action="" >
                <label for="username">User Name</label>
                <input type="text" id="username" name="username" value="<?= htmlspecialchars($userName) ?>">
                <br>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
                <br>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <br>
                <button type="submit"  class="btn btn-primary w100">Register</button>
            </form>
        </div>  
    </div>
</main>
</body>
</html>
