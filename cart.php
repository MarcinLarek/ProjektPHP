<?php
require_once 'db_utils.php';
if (isset($_GET['id'])) {
  $stmt = $db->prepare("INSERT INTO orders (user_id, product_id, order_date, status) VALUES (?, ?,?,?)");
  $usr = $_SESSION['ID'];
  $prod = $_GET['id'];
  $orddat = date('Y-m-d H:i:s');
  $status = ("W koszyku");
  $stmt->bind_param('iiss', $usr, $prod, $orddat, $status );
  $result = $stmt->execute();
  header("Location: cart.php?success");
}
if (isset($_GET['success'])) {
  echo "<div style='margin-bottom:0px !important;' class='alert alert-success' role='alert'>Dodano produkt do koszyka</div>";
}
?>
