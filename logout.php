<?php
require_once 'db_utils.php';
//Jeśli jesteśmy zalogowani (czyli jest ustawiona zmienna session), to czyścimy tą zmienną co sprawie że użytkownik
//zostaje wylogowany, następnie odświeżamy strone
if (isset($_SESSION['username'])) {
  unset($_SESSION['username'], $_SESSION['password'],$_SESSION['admin'],$_SESSION['ID']);
  header("Refresh:0");

}
//Jeśli zmienna sesja nie jest ustawiona, znaczy że poprawnie wylogowaliśmy się ze strony. Następnie 'wklejamy'
//stronę główną
else {
  echo "<div style='margin-bottom:0px !important;' class='alert alert-success' role='alert'>Pomyślnie wylogowano się z konta</div>";
  require_once 'index.php';
}
 ?>
