<?php 
function validateTextInput($input_str){
    // if (strlen($input_str) < 3) {
    //     return false;
    // };
    $inputValid  = trim($input_str);
    $inputValid = htmlspecialchars($input_str);
    return $inputValid;
}
function validateEmail($input_email){
    $emailValid = trim($input_email);
    $emailValid = filter_var($emailValid, FILTER_VALIDATE_EMAIL);
    return $emailValid;
}
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

?>