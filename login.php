<?php
require_once 'db_utils.php';

if (isset($_POST['send'])) {
  $stmt = $db->prepare("SELECT * FROM uzytkownicy WHERE username = ?");
  $stmt->bind_param('s',$_POST['username']);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($data = $result->fetch_array()) {
    if (password_verify($_POST['pass'], $data['password'])) {
      echo "<div style='color: green'> Sukces</div>";
      $_SESSION["username"] = $data['username'];
      $_SESSION["password"] = $data['password'];
      break;
    }
  }
}
 ?>

 <form action="login.php" method="post" style="display: flex; margin: 0 auto; flex-direction: column;">
   <label for="username">Login</label>
   <input type="text" name="username">

   <label for="pass">Hasło</label>
   <input type="password" name="pass">

   <input type="submit" name="send" value="Zaloguj się">
 </form>
