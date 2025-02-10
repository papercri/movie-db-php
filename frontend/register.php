<?php
    require '../backend/register.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/styles.css">
    <title>Registro de Usuario</title>
  
</head>
   
<body>
<?php include 'navbar.php'; ?>
<main>
<div class="container ">
<h1>Add User</h1>
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
