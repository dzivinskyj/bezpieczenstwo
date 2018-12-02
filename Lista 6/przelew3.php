<?php
session_start();
require_once(__DIR__."/main.php");
$query =<<<EOT
    CALL przelew({$_SESSION['user_id']},"{$_SESSION['nr']}",{$_SESSION['kwota']},"{$_SESSION['tytul']}","{$_SESSION['odbiorca']}");
EOT;
$result = mysqli_query($db,$query);
if($db->error){
  echo ("Błąd: " . $db->error);
  echo "<a href='mainpage.php'>Strona główna</a><br/>";
}
else{
$page=<<<EOT
<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <script src="myscript.js"></script>
</head>

<body onload="podmiana()">
  <center>
  <h2>Wykonano przelew!</h2>
    <table>
      <tr>
        <th><b>Nazwa odbiorcy:</b></th>
        <th><p>{$_SESSION["odbiorca"]}</p></th><br><br>
      </tr>
      <tr>
        <th><b>Nr konta:</b></th>
        <th><p class="nr_konta">{$_SESSION["nr"]}</p></th><br>
      </tr>
      <tr>
        <th><b>Kwota:</b></th>
        <th><p>{$_SESSION["kwota"]}</p></th><br><br>
      </tr>
      <tr>
        <th><b>Tytuł:</b></th>
        <th><p>{$_SESSION["tytul"]}</p></th><br>
      </tr>
    </table>
    <br/><a href='mainpage.php'>Strona główna</a><br/>
  </center>
</form>
</body>
EOT;
echo $page;
}
?>
