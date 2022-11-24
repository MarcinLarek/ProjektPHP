<?php
require_once 'db_utils.php';

if (isset($_SESSION['username'])) {
  unset($_SESSION['username'], $_SESSION['password'],$_SESSION['admin'],$_SESSION['ID']);
  header("Refresh:0");

}
else {
  echo "<div class='alert alert-success' role='alert'>Pomyślnie wylogowano się z konta</div>";
  require_once 'index.php';
}
 ?>
