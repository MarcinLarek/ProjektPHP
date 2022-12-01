<?php
require_once 'db_utils.php';
//Przeszukujemy bazę danych po kolumnie username, w celu znalezienia użytkownika, który został podany w formularzu
if (isset($_POST['send'])) {
  $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->bind_param('s',$_POST['username']);
  $stmt->execute();
  $result = $stmt->get_result();
  //Gdy znajdziemy użytkownika sprawdzamy poprawność wprowadzanego hasła komendą password_verify
  while ($data = $result->fetch_array()) {
    if (password_verify($_POST['pass'], $data['password'])) {
      //Jeśli wprowadzono poprawne hasło ustawiamy zmienną session, pobierając dane o użytkowniku i odświeżamy strone.
      $_SESSION["username"] = $data['username'];
      $_SESSION["password"] = $data['password'];
      $_SESSION["admin"] = $data['admin'];
      $_SESSION["ID"] = $data['ID'];
      $_SESSION["admin"] = $data['admin'];
      header("Refresh:0");
      break;
    }
  }
}
//Jeśli jest ustalona zmienna session (po udanym logowaniu, lub wejściu jako zalogowany użytkownik), wyświetlamy
//odpowiedni komunikat i 'ładujemy' stronę index.php
if(isset($_SESSION["username"])){
echo "<div style='margin-bottom:0px !important;' class='alert alert-success' role='alert'>Pomyślnie zalogowano użytkownika</div>";

require_once 'index.php';
}
//Jeśli użytkownik nie jest zalogowawany  wyświetlamy formularz logowania.
else {
 ?>

 <div class="container pt-5">
   <form action="login.php" method="post">
     <div class="row align-items-center justify-content-center">
       <div class="form-group col-md-6">
         <label class="control-label" for="username">Login</label>
         <input class="form-control" type="text" name="username">

         <label class="control-label pt-3" for="pass">Hasło</label>
         <input class="form-control" type="password" name="pass">

         <div class="d-flex align-items-center justify-content-center pt-3">
           <input type="submit" class="btn btn-primary" name="send" value="Zaloguj się">
         </div>
       </div>
     </div>
   </form>
 </div>
<?php } ?>
