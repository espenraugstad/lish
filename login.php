<?php
if (!empty($_POST)) {

    include_once "./db.inc.php";

    $db = new Database();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $auth = $db->authenticate($email, $password);
    if($auth){
        header("Location: ./dashboard.php");
        exit();
    } else {
        header("Location: ./index.php?access=false");
        exit();
    }

} else {
    header("Location: ./index.php");
    exit();
}
