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
    <form method="POST" action="logowanie.php">
      <table>
        <tr>
          <th><b>Login:</b></th>
          <th><input type="text" name="login"></th><br><br>
        </tr>
        <tr>
          <th><b>Hasło:</b></th>
          <th><input type="password" name="haslo"></th><br>
        </tr>
      </table>
      <input type="submit" value="Zaloguj się" name="zaloguj">
    </form>
    <a href="zarejestruj.php">Zarejestruj się</a><br/>
    <a href="reset.php">Zapomniałeś hasła?</a>
  </center>
</body>
