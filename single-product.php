<?php
    require_once 'db_utils.php';


    $id = $_GET['id'];
    $query = mysqli_query($db, "SELECT * FROM products where id=$id");
?>
<?php while($rekord = mysqli_fetch_array($query)) { ?>
    <div class="wrapper-single">
        <div class="category">
            <a style="text-decoration:none;color:black;" href="index.php">Just IT Stuff</a> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
            <a style="text-decoration:none;color:black;" href="shop.php">Sklep</a> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
            <?php echo $rekord[2] ?> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
            <?php echo $rekord[1] ?>
        </div>
        <div class="product">
            <figure>
                <img class="img-fluid" src="<?php echo $rekord[4] ?>" alt="">
            </figure>
            <div class="product-wrapper">
                <div class="product-name">
                    <p><?php echo $rekord[1] ?></p>
                    <hr><hr>
                </div>
                <div class="product-description">
                    <p><?php echo $rekord[5] ?></p>
                </div><hr>
                <div class="product-available">Produkt:
                    <?php
                        if( $rekord[6] == 1 ) {
                            echo "<span class='available'>Dostępny</span>";
                        }else {
                            echo "<span class='unavailable'>Niedostępny</span>";
                        }
                    ?>
                </div><br />
                <div class="product-price">
                    <p>Cena: <?php echo $rekord[3] ?> zł</p>
                </div>
                <?php
                if ($rekord[6] == 1) {
                  ?>
                  <div class="product-cart">
                      <a href="cart.php?id=<?php echo $id; ?>"><svg style="cursor:pointer;" xmlns="http://www.w3.org/2000/svg" width="38" height="28" viewBox="0 0 38 28" fill="none">
                          <path d="M24.8027 24.8223C24.8027 26.3047 23.6133 27.4941 22.1309 27.4941C20.6484 27.4941 19.4473 26.3047 19.4473 24.8223C19.4473 23.3398 20.6543 22.1387 22.1309 22.1387C23.6191 22.1387 24.8027 23.3398 24.8027 24.8223ZM9.92578 22.1387C8.44336 22.1387 7.25391 23.3457 7.25391 24.8223C7.25391 26.2988 8.44336 27.4941 9.92578 27.4941C11.4082 27.4941 12.6094 26.3047 12.6094 24.8223C12.6094 23.3398 11.4082 22.1387 9.92578 22.1387V22.1387ZM27.0176 6.31836C9.31055 6.31836 4.79883 5.56836 0 0.505859C2.01563 3.53516 3.12305 9.23047 21.8613 8.95508C41.3906 8.66211 29.4785 14 26.0098 20.0234C36.9492 10.2559 44.7246 6.31836 27.0176 6.31836V6.31836Z" fill="#34CCFF"/>
                      </svg>Dodaj do koszyka</a>
                  </div>
                  <?php
                }
                else {
                  ?>

                  <?php
                }
                 ?>
            </div>
        </div>
    </div>
<?php } ?>
