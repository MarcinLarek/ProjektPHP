<?php
require_once 'db_utils.php';

if (isset($_POST['send'])) {
  $validated = true;
  if (is_numeric($_POST['price'])) {

  }
  else {
    echo "<div class='alert alert-danger' role='alert'> Cena musi być liczbą</div>";
    $validated = false;
  }
  if (strlen($_POST['name']) < 1) {
    echo "<div class='alert alert-danger' role='alert'> Nazwa towaru nie może być pusta</div>";
    $validated = false;
  }
  if (strlen($_POST['name']) > 255) {
    echo "<div class='alert alert-danger' role='alert'> Za długa nazwa towaru</div>";
    $validated = false;
  }
  if (strlen($_POST['category']) < 1) {
    echo "<div class='alert alert-danger' role='alert'> Nazwa kategorii nie może być pusta</div>";
    $validated = false;
  }
  if (strlen($_POST['category']) > 255) {
    echo "<div class='alert alert-danger' role='alert'> Za długa nazwa kategorii</div>";
    $validated = false;
  }
  if (strlen($_POST['photo']) < 1) {
    echo "<div class='alert alert-danger' role='alert'> Zdjęcie nie może być puste</div>";
    $validated = false;
  }
  if (strlen($_POST['description']) < 1) {
    echo "<div class='alert alert-danger' role='alert'> Opis nie może być pusty</div>";
    $validated = false;
  }
  if ($validated ) {
    $stmt = $db->prepare("INSERT INTO products (name, category, price, photo, description) VALUES (?, ?, ?, ?, ?)");
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $photo = $_POST['photo'];
    $description = $_POST['description'];
    $stmt->bind_param('ssiss', $name, $category, $price, $photo, $description );
    $result = $stmt->execute();
    if($result) {
      echo "<div class='alert alert-success' role='alert'>Pomyślnie dodano produkt</div>";
    }
    else {
      echo "<div class='alert alert-danger' role='alert'>Błąd podczas dodawania produktu</div>";
    }
  }

}
?>

<div class="container pt-5">
  <form action="addproduct.php" method="post">
    <div class="row align-items-center justify-content-center">
      <div class="form-group col-md-6">
        <label class="control-label" for="name">Nazwa</label>
        <input class="form-control" type="text" name="name">

        <label class="control-label pt-3" for="category">Kategoria</label>
        <select class="form-control" name="category">
          <option value="myszka">Myszka</option>
          <option value="słuchawki">Słuchawki</option>
          <option value="myszka">Klawiatura</option>
        </select>

        <label class="control-label pt-3" for="price">Cena</label>
        <input class="form-control" type="number" name="price">

        <label class="control-label pt-3" for="photo">Link Do Zdjęcia</label>
        <input class="form-control" type="text" name="photo" >

        <label class="control-label pt-3" for="description">Opis</label>
        <input class="form-control" type="text" name="description" >

        <div class="d-flex align-items-center justify-content-center pt-3">
          <input type="submit" class="btn btn-primary" name="send" value="Stwórz nowy produkt">
        </div>
      </div>
    </div>
  </form>
</div>
