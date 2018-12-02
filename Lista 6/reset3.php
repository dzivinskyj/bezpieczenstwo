<?php
session_start();
$log =  $_SESSION["reset_login"];
require_once(__DIR__."/main.php");
$pass1 = $_POST["haslo1"];
$pass2 =$_POST["haslo2"];
if($pass1!=$pass2)
  echo "Hasła się nie zgadzają!";
else{

  $query =<<<EOT
      CALL reset_hasla("{$log}","{$pass1}");
EOT;
  $result = mysqli_query($db,$query);
  if($db->error){
    echo "Błąd: {$db->error}";
  } else {
    echo "Ustawiono nowe hasło!";
  }
}
echo "<a href='index.php'>Strona główna</a><br/>";
?>
