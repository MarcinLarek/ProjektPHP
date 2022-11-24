<?php
require_once 'db_utils.php';
$naz = '';

$query = mysqli_query($db, "SELECT * FROM products"); ?>


<div class="container" style="padding-top: 100px;">
    <div class="shop-title">
        <p>SKLEP</p>
    </div>
    <div class="row">
        <?php while($rekord = mysqli_fetch_array($query)) {
            $id = $rekord[0] ?>
            <div class="col-4 pb-4 cart-div">
                <div class="shadow p-4 bg-body rounded">
                    <div class="cart-img" style="display:flex;justify-content:center;margin-bottom:10px;">
                        <a href="single-product.php?id=<?php echo $id; ?>"><img class="img-fluid" src="<?php echo $rekord[4] ?>"/>
                    </div>
                    <div style="display:flex;justify-content:center;margin-bottom:20px;"><a style="text-decoration:none;color:black;" href="single-product.php"><?php echo $rekord[2] ?></a></div>
                    <div style="display:flex;justify-content:center;font-size: 25px;"><?php echo $rekord[3] ?>
                        <span style="font-size:16px;">&nbsp;zł</span>
                    </div>
                    <?php if (isset($_SESSION["username"])) { ?>
                        <div style="display:flex;justify-content:flex-end";>
                            <a href="#">
                                <svg style="cursor:pointer;" xmlns="http://www.w3.org/2000/svg" width="38" height="28" viewBox="0 0 38 28" fill="none">
                                    <path d="M24.8027 24.8223C24.8027 26.3047 23.6133 27.4941 22.1309 27.4941C20.6484 27.4941 19.4473 26.3047 19.4473 24.8223C19.4473 23.3398 20.6543 22.1387 22.1309 22.1387C23.6191 22.1387 24.8027 23.3398 24.8027 24.8223ZM9.92578 22.1387C8.44336 22.1387 7.25391 23.3457 7.25391 24.8223C7.25391 26.2988 8.44336 27.4941 9.92578 27.4941C11.4082 27.4941 12.6094 26.3047 12.6094 24.8223C12.6094 23.3398 11.4082 22.1387 9.92578 22.1387V22.1387ZM27.0176 6.31836C9.31055 6.31836 4.79883 5.56836 0 0.505859C2.01563 3.53516 3.12305 9.23047 21.8613 8.95508C41.3906 8.66211 29.4785 14 26.0098 20.0234C36.9492 10.2559 44.7246 6.31836 27.0176 6.31836V6.31836Z" fill="#34CCFF"/>
                                </svg>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
