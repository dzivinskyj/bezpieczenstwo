<?php
session_start();
require_once(__DIR__."/main.php");
$log = $_POST["login"];
$pass=$_POST["haslo"];
$query =<<<EOT
    CALL sprawdzanie_hasla("{$log}","{$pass}");
EOT;
$result = mysqli_query($db,$query);
$id;
$row = mysqli_fetch_assoc($result);
$id = $row["id"];
if(!$id){
  echo "Błędny login lub hasło!";
  echo "<a href='index.php'>Strona główna</a><br/>";
} else {

  $_SESSION["user_id"] = $id;
  echo $id;
  echo "<a href='index.php'>Strona główna</a><br/>";
  header("location:mainpage.php");
}

?>
