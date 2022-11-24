<?php
require_once 'db_utils.php';






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
?>

<div class="container pt-5">
  <form action="editorder.php" method="post">
    <div class="row align-items-center justify-content-center">
      <div class="form-group col-md-6">
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
        <input class="form-control" type="date" name="date" value="<?php echo $order['date'] ?>">

        <label class="control-label pt-3" for="status">Status Zamówienia</label>
        <input class="form-control" type="text" name="status" value="<?php echo $order['status'] ?>">

        <div class="d-flex align-items-center justify-content-center pt-3">
          <input type="submit" class="btn btn-primary" name="send" value="Zapisz zmiany">
        </div>
      </div>
    </div>
  </form>
</div>
