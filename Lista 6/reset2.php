<?php
require_once(__DIR__."/main.php");
session_start();
$user = $_POST["login"];
$query =<<<EOT
    SELECT login FROM uzytkownicy WHERE login="{$user}";
EOT;
$result = mysqli_query($db,$query);
if(!mysqli_fetch_assoc($result)){
  echo "Nie ma takiego użytkownika!";
}
else{
$_SESSION["reset_login"] = $user;

$p=<<<EOT
<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
</head>

<body>

  <center>
    <form method="POST" action="reset3.php">
      <table>
        <tr>
          <th><b>Nowe hasło:</b></th>
          <th><input type="password" name="haslo1"></th><br>
        </tr>
        <tr>
          <th><b>Powtórz hasło:</b></th>
          <th><input type="password" name="haslo2"></th><br><br>
        </tr>
      </table>
      <input type="submit" value="Zresetuj haslo" name="reset">
    </form>
    <a href="index.php">Strona główna</a><br/>
  </center>
</body>
EOT;
echo $p;
}
