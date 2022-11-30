<?php
    require_once 'db_utils.php';
    $naz = '';

    $query = mysqli_query($db, "SELECT * FROM products");

    if (isset($_POST['add'])) {
        if (isset($_SESSION["cart"])) {
            $item_array_id = array_column($_SESSION["cart"], "id");
            if (!in_array($_GET['id'].$item_array_id)) {
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'hidden_name' => $_GET["name"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo `<script>window.location="Cart.php"</script>`;
            } else {
                echo `<script>alert("Produkt jest juz dodany do koszyka")</script>`;
                echo `<script>window.location="Cart.php"</script>`;
            }
        }else {

        }
    }

?>


<div class="container" style="padding-top: 100px;">
    <div class="shop-title">
        <p>SKLEP</p>
    </div>
    <form style="margin-bottom:200px;" method="post" action="shop.php?action=add&id=<?php echo $rekord[0] ?>">
        <div class="row">
            <?php
            if (mysqli_num_rows($query) > 0) {
                while($rekord = mysqli_fetch_array($query)) {
                    $id = $rekord[0] ?>
                    <div class="col-4 pb-4 cart-div">
                        <div class="shadow p-4 bg-body rounded">
                            <div class="cart-img" style="display:flex;justify-content:center;margin-bottom:10px;">
                                <a href="single-product.php?id=<?php echo $id; ?>"><img class="img-fluid" src="<?php echo $rekord[4] ?>"/>
                            </div>
                            <div style="display:flex;justify-content:center;margin-bottom:20px;"><a style="text-decoration:none;color:black;" href="single-product.php"><?php echo $rekord[1] ?></a></div>
                            <div style="display:flex;justify-content:center;font-size: 25px;"><?php echo $rekord[3] ?>
                                <span style="font-size:16px;">&nbsp;zł</span>
                            </div>
                            <input type="hidden" name="hidden_name" value='<?php echo $rekord[1] ?>' value="">
                            <?php if (isset($_SESSION["username"])) { ?>
                                <?php
                                if ($rekord[6] == 1) {

                                 ?>
                                 <div style="display:flex;justify-content:flex-end";>
                                     <a href="cart.php?id=<?php echo $id; ?>">
                                       <button type="button" class="btn btn-dark" name="button">Dodaj do koszyka</button>
                                     </a>
                                 </div>
                                 <?php
                               }else {
                                 ?>
                                 <button type="button" class="btn btn-danger" disabled name="button">Produkt Niedostępny</button>
                                 <?php
                               }
                                  ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </form>


</div>
