<?php
if(!empty($_POST)){
    session_start();
    include "./db.inc.php";

    $link = $_POST['link'];
    $uid = $_SESSION['uid'];
    
    $shortCode = bin2hex(random_bytes(2));
    echo $shortCode;

    $db = new Database();
    if($db->addLink($link, $shortCode, $uid)){
        header("Location: ./dashboard.php?sq=" . $shortCode);
        exit();
    } else {
        echo "No";
    }
}
