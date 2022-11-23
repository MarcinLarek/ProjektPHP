<?php
require_once 'db_utils.php';

if (isset($_POST['send'])) {
  $validated = true;
  if (strlen($_POST['username']) > 30) {
    echo "<div style='color: red'> Za długa nazwa użytkownika</div>";
    $validated = false;
  }
  if (strlen($_POST['username']) < 1) {
    echo "<div style='color: red'> Za krótka nazwa użytkownika</div>";
    $validated = false;
  }
  if ($_POST['pass1'] != $_POST['pass2']) {
    echo "<div style='color: red'> Hasła nie są identyczne</div>";
    $validated = false;
  }
  if (strlen($_POST['pass1']) < 1) {
    echo "<div style='color: red'> Hasło nie może być puste</div>";
    $validated = false;
  }
  if ($validated ) {
    $stmt = $db->prepare("INSERT INTO uzytkownicy (username, password) VALUES (?, ?)");
    $usr = $_POST['username'];
    $pass = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
    $stmt->bind_param('ss', $usr, $pass );
    $result = $stmt->execute();
    if($result) {
      echo "<div style='color: green'> Sukces</div>";
    }
    else {
      echo "<div style='color: green'> nie sukces</div>";
    }

  }
}
 ?>

 <form action="register.php" method="post" style="display: flex; margin: 0 auto; flex-direction: column;">
   <label for="username">Login</label>
   <input type="text" name="username">

   <label for="pass1">Hasło</label>
   <input type="password" name="pass1" >

   <label for="pass2">Powtórz hasło</label>
   <input type="password" name="pass2">

   <input type="submit" name="send" value="Zarejestruj się">
 </form>
