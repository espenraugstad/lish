<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="color-scheme" content="light dark" />
    <!-- Centered viewport -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
    <title>Document</title>
  </head>
  <body>
    <main>
        <h1>Register account here</h1>
        <article><?php 
        if(!empty($_GET)){
          echo "The user with the e-mail " . $_GET["exists"] . " already exists.";
        }
        ?></article>
        <form action="register_user.php" method="post">
            <label for="email">E-mail: </label>
            <input type="email" name="email" id="">
            <label for="password">Password: </label>
            <input type="password" name="password" id="">
            <button type="submit">Register</button>
        </form>
        <p><a href="./index.php">Return to log in.</a></p>
    </main>
  </body>
</html>
