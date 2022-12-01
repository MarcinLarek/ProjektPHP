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

$userid = $_SESSION['ID'];
$result = mysqli_query($db,"SELECT * FROM orders WHERE user_id = $userid"); ?>
        <div class="cart-wrapper">

                <div class="row">
            <div class="col testus">
            Fotka
            </div>
            <div class="col testus">
            Nazwa
            </div>
            <div class="col testus">
            Cena
            </div>
            <div class="col testus">
            Data zakupu
            </div>
            <div class="col testus">
            Status zamówienia
            </div>
        </div>
            <hr>

<?php foreach ($result as $order) {
    $prodid = $order['product_id'];
    $product = mysqli_query($db,"SELECT * FROM products WHERE id = $prodid");
    $singleproduct = $product->fetch_row(); ?>

    <div class="row">
<div class="col text-center testus">
<img style="height:100px" src="<?php echo $singleproduct[4] ?>" alt="">
</div>
<div class="col testus">
<?php echo $singleproduct[1] ?>
</div>
<div class="col testus">
<?php echo $singleproduct[3] ?>zł
</div>
<div class="col testus">
<?php echo $order["order_date"] ?>
</div>
<div class="col testus">
<?php echo $order["status"] ?>
</div>
    </div>
        <hr>

  <?php
}
?>

</div>
