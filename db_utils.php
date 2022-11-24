<?php
session_start();
$db = new mysqli("localhost","root","","project");
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"> <b>Just IT Stuff</b> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php
      if (isset($_SESSION["username"])) {
       ?>
     <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex w-100 justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Koszyk</a>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION["username"] ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Wyloguj</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="useredit.php">Edytuj dane</a>
            </li>
          </ul>
        </li>

      </ul>
      <?php
    }
    else {
       ?>
       <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex w-100 justify-content-end">
         <li class="nav-item">
           <a class="nav-link" href="register.php">Rejestracja</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="login.php">Login</a>
         </li>
       </ul>
       <?php
     }
        ?>
    </div>
  </div>
  </nav>



<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
 ?>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex w-100 justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="addproduct.php">Dodaj produkt</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="editorders.php">Edytuj zamówienia</a>
          </li>
        </ul>
      </div>
    </div>
 </nav>
 <?php
}
  ?>
