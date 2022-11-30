<?php
require_once 'db_utils.php';


if (isset($_POST['send'])) {
  $_GET['id'] = $_POST['order_id'];
  $stmt = $db->prepare("UPDATE orders SET user_id=?, product_id=?, status=?, order_date=? WHERE Id=?;");
  $usr = $_POST['user_id'];
  $prod = $_POST['product_id'];
  $date = $_POST['date'];
  $status = $_POST['status'];
  $stmt->bind_param('iissi', $usr, $prod,$status,$date, $_GET['id'] );
  $result = $stmt->execute();
}

$sql = "SELECT * FROM orders WHERE id=?";
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();

$sql = "SELECT * FROM users";
$users = $db->query($sql);
$sql = "SELECT * FROM products";
$products = $db->query($sql);



if (isset($_SESSION['username'])) {
?>

<div class="container pt-5">
  <form action="editorder.php" method="post">
    <div class="row align-items-center justify-content-center">
      <div class="form-group col-md-6">

        <input type="hidden" name="order_id" value="<?php echo $_GET['id']; ?>">

        <label class="control-label" for="user_id">Użytkownik</label>
        <select class="form-control" name="user_id">
          <?php
            foreach ($users as $user) {
              $usid = $user['ID'];
              echo "<option value='$usid'>".$user['username']."</option>";
            }
           ?>
        </select>

        <label class="control-label pt-3" for="product_id">Produkt</label>
        <select class="form-control" name="product_id">
          <?php
            foreach ($products as $product) {
              $prodid = $product['Id'];
              echo "<option value='$prodid'>".$product['name']."</option>";
            }
           ?>
        </select>

        <label class="control-label pt-3" for="date">Data zamówienia</label>
        <input class="form-control" type="date" name="date" value="<?php echo $order['order_date'] ?>">

        <label class="control-label pt-3" for="status">Status Zamówienia</label>
        <input class="form-control" type="text" name="status" value="<?php echo $order['status'] ?>">

        <div class="d-flex align-items-center justify-content-center pt-3">
          <input type="submit" class="btn btn-primary" name="send" value="Zapisz zmiany">
        </div>
      </div>
    </div>
  </form>
</div>

<?php
}
else {
?>
<div style='margin-bottom:0px !important;' class='alert alert-danger' role='alert'>Brak uprawnień do przeglądania strony</div>
<?php
}
 ?>
