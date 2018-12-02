<?php
session_start();
?>
<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
</head>

<body>
    <center>
        <p>Witaj!</p>
        <br/><a href="przelew.php">Zrób przelew</a><br/>
        <a href="przelewy.php">Wykonane przelewy</a><br/>
        <form method="POST" action="wyloguj.php">
            <input type="submit" value="Wyloguj" name="wyloguj">
        </form>
    </center>
</body>
