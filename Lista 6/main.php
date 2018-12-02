<?php
$DB_NAME = "localhost";
$USER = "root";
$PASS = "qwerty";

$db= mysqli_connect($DB_NAME,$USER,$PASS);
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db( $db, 'bank');
?>
