<?php 

//Validador y limpiador de imputs
    function validateTextInput($input_str){
        $inputValid  = trim($input_str);
        $inputValid = htmlspecialchars($input_str);
        return $inputValid;
    }
//Validador y limpiador de emails
    function validateEmail($input_email){
        $emailValid = trim($input_email);
        $emailValid = filter_var($emailValid, FILTER_VALIDATE_EMAIL);
        return $emailValid;
    }
//Validador y limpiador de password
    function validateAndHashPassword($input_pass){
        $passwordValid = trim($input_pass);
        // Longitud mínima de 8 caracteres y máxima de 20 caracteres
        if (strlen($passwordValid) < 4 || strlen($passwordValid) > 20) {
            return false;
        };
        // Verificar si contiene al menos una letra mayúscula, una letra minúscula, un número y un carácter especial
        if (!preg_match('/[A-Z]/', $passwordValid) || !preg_match('/[a-z]/', $passwordValid) || !preg_match('/[0-9]/', $passwordValid) || !preg_match('/[\W]/', $passwordValid)) {
            return false;
        };
        $hashedPassword = password_hash($passwordValid, PASSWORD_BCRYPT);
        return $hashedPassword;
    }
//Generador de estrellitas ratings
    function generateStars($rating) {
        $starsCount = round($rating / 2); 
        return str_repeat('<i class="fas fa-star text-warning"></i>', $starsCount) .
            str_repeat('<i class="far fa-star text-warning"></i>', 5 - $starsCount);
    }
?>