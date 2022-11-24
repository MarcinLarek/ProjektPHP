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
    $stmt = $db->prepare("UPDATE users SET username=?, password=? WHERE id=?");
    $usr = $_POST['username'];
    $pass = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
    $stmt->bind_param('ssi', $usr, $pass, $_SESSION['ID'] );
    $result = $stmt->execute();
    if($result) {
      echo "<div class='alert alert-success' role='alert'>Pomyślnie założono konto</div>";
    }
    else {
      echo "<div class='alert alert-danger' role='alert'>Błąd podczas zakładania konta</div>";
    }
  }
  $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->bind_param('s',$_POST['username']);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($data = $result->fetch_array()) {
    if (password_verify($_POST['pass1'], $data['password'])) {
      $_SESSION["username"] = $data['username'];
      $_SESSION["password"] = $data['password'];
      $_SESSION["admin"] = $data['admin'];
      $_SESSION["ID"] = $data['ID'];
      $_SESSION["admin"] = $data['admin'];
      break;
    }
  }
}
 ?>

 <div class="container pt-5">
   <form action="useredit.php" method="post">
     <div class="row align-items-center justify-content-center">
       <div class="form-group col-md-6">
         <label class="control-label" for="username">Login</label>
         <input class="form-control" type="text" name="username"
         value="<?php echo $_SESSION["username"] ?>"
         >

         <label class="control-label pt-3" for="pass1">Hasło</label>
         <input class="form-control" type="password" name="pass1" >

         <label class="control-label pt-3" for="pass2">Powtórz hasło</label>
         <input class="form-control" type="password" name="pass2">

         <div class="d-flex align-items-center justify-content-center pt-3">
           <input type="submit" class="btn btn-primary" name="send" value="Zmień dane">
         </div>
       </div>
     </div>
   </form>
 </div>
