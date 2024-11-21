<?php
if (isset($_GET['shortCode'])) {
    include "./db.inc.php";
    $shortCode = $_GET['shortCode'];
    echo htmlspecialchars($shortCode);

    // Fetch full link from database
    $db = new Database();

    $fullLink = $db->getFullLink($shortCode);
    print_r($fullLink);
    // Redirect
    header('Location: ' . $fullLink['link']);
    exit();


} else {
    echo "No shortCode provided.";
}
?>