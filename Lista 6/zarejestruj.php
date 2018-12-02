<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
</head>

<body>
  <center>
    <form method="POST" action="rejestracja.php">
      <table>
        <tr>
          <th><b>Login:</b></th>
          <th><input type="text" name="login"></th><br><br>
        </tr>
        <tr>
          <th><b>Hasło:</b></th>
          <th><input type="password" name="haslo1"></th><br>
        </tr>
        <tr>
          <th><b>Powtórz hasło:</b></th>
          <th><input type="password" name="haslo2"></th><br><br>
        </tr>
        <tr>
          <th><b>Email:</b></th>
          <th><input type="text" name="email"></th><br>
        </tr>
      </table>
      <input type="submit" value="Utwórz konto" name="rejestruj">
    </form>
    <a href="index.php">Masz już konto?</a><br/>
  </center>
</body>
