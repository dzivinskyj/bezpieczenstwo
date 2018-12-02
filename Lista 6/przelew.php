<?php
session_start();
?>
<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <script src="myscript.js"></script>
</head>

<body>
  <center>
    <table>
      <form method="POST" action="przelew2.php">
        <tr>
          <th><b>Nazwa odbiorcy:</b></th>
          <th><input type="text" name="odbiorca"></th><br><br>
        </tr>
        <tr>
          <th><b>Nr konta:</b></th>
          <th><input id="nr_konta" type="text" name="nr"></th><br>
        </tr>
        <tr>
          <th><b>Kwota:</b></th>
          <th><input type="text" name="kwota"></th><br><br>
        </tr>
        <tr>
          <th><b>Tytuł:</b></th>
          <th><input type="text" name="tytul"></th><br>
        </tr>
      </table>
      <input type="submit" onclick="podmiana2()" value="Dalej" name="dalej">
    </form>
    <br/><a href='mainpage.php'>Strona główna</a><br/>
  </center>
</form>
</body>
