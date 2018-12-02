<?php
require_once(__DIR__."/main.php");
$log = $_POST["login"];
$pass1=$_POST["haslo1"];
$pass2=$_POST["haslo2"];
$email=$_POST["email"];
if($pass1!=$pass2)
  echo "Hasła się nie zgadzają!";
else{

$query =<<<EOT
    CALL nowy_uzytkownik("{$log}","{$pass1}}","$email");
EOT;
$result = mysqli_query($db,$query);
    if(!$result){
      echo ("Błąd: " . $db->error);
      echo "<a href='index.php'>Strona główna</a><br/>";
    }
    else{
      echo "Dodano użytkownika!";
      echo "<a href='index.php'>Strona główna</a><br/>";
    }
  }
?>
