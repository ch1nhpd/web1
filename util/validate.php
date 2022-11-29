<?php
function valid_password($password) {
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        return FALSE;
    }else{
        return TRUE;
    }
}
// if (!valid_password('Qaz@11333')){
//     echo 'false';
// }else{
//     echo 'true';
// }

?>