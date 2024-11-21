<?php
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <meta name="color-scheme" content="light dark">
   <!-- Centered viewport -->
<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
>
  </head>
  <body>
    <main>
        <h1>Shorten links</h1>
        <p>Log in to shorten a link and manage shortened links.</p>
        <form action="login.php" method="post">
            <label for="email">E-mail: </label>
            <input type="email" name="email" id="">
            <label for="password">Password: </label>
            <input type="password" name="password" id="">
            <button type="submit">Log in</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here.</a></p>
    </main>
    
  </body>
</html>
