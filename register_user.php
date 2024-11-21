<?php
if(!empty($_POST)){
    include_once "./db.inc.php";

    $db = new Database();
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Step 1 - Does email already exists?
    if($db->emailExists($email)){
        header("Location: ./register.php?exists=" . $email);
    } else {
        $regRes = $db->register($email, $password);
        if($regRes){
            header("Location: ./index.php");
            exit();
        }
    }
}
