<?php
session_start();
require_once(__DIR__."/main.php");
$query =<<<EOT
    SELECT * FROM przelewy WHERE id_uzytkownika = {$_SESSION['user_id']};
EOT;
$result = mysqli_query($db,$query);
if($result->num_rows==0){
  echo ("Nie wykonałeś jeszcze żadnych przelewów");
  echo "<br/><a href='mainpage.php'>Strona główna</a><br/>";
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
  <h2>Wykonane przelewy</h2>
    <table>
      <tr>
        <th><b>Nazwa odbiorcy</b></th>
        <th><b>Numer konta</b></th>
        <th><b>Tytul</b></th>
        <th><b>Kwota</b></th>
        <th><b>Data</b></th>
      </tr>
EOT;
while($row = mysqli_fetch_assoc($result)){
$page.=<<<EOT
<tr>
  <th><b>{$row["odbiorca"]}</b></th>
  <th><b class="nr_konta">{$row["nr_konta"]}</b></th>
  <th><b>{$row["tytul"]}</b></th>
  <th><b>{$row["kwota"]}</b></th>
  <th><b>{$row["data"]}</b></th>
</tr>
EOT;
    }
$page.=<<<EOT
    </table>
    <br/><a href='mainpage.php'>Strona główna</a><br/>
  </center>
</form>
</body>
EOT;
echo $page;
}
?>
