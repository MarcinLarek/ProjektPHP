<?php
require_once 'db_utils.php';

if (isset($_POST['send'])) {
  $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->bind_param('s',$_POST['username']);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($data = $result->fetch_array()) {
    if (password_verify($_POST['pass'], $data['password'])) {
      $_SESSION["username"] = $data['username'];
      $_SESSION["password"] = $data['password'];
      header("Refresh:0");
      break;
    }
  }
}
if(isset($_SESSION["username"])){
echo "<div class='alert alert-success' role='alert'>Pomyślnie zalogowano użytkownika</div>";
}
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
