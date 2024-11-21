<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: ./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light dark" />
    <!-- Centered viewport -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Dashboard</h1>
        <p>Welcome. Add a link below to shorten it.</p>
        <form action="shorten.php" method="post">
            <label for="link">Link:</label>
            <input type="text" name="link" id="">
            <button type="submit">Shorten</button>
        </form>
        <p><a href="#">Manage shortened links.</a></p>
        <?php
            if(!empty($_GET)){
                echo "<h2>Your shortened link</h2>";
                echo "<article>http://localhost/lish/" . $_GET['sq'] . "</article>";
            }
        ?>
    </main>
</body>

</html>