<?php
include "../core/produit.php";
$pro = new Produit();
if(isset($_SESSION['cart'])) {
?>
<div  id="mycart">
<li class="header-cart dropdown default-dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <div class="header-btns-icon">
            <i class="fa fa-shopping-cart"></i>
            <span class="qty"><?php    count($_SESSION['cart'])   ?></span>
        </div>
        <strong class="text-uppercase">My Cart:</strong>
        <br>
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $row)  {
            $total = $total + (json_decode($row, true)['prix'] * json_decode($row, true)['quantite']);

        }
        echo '<span>'. $total . 'TND</span>'
        ?>

    </a>
<div class="custom-menu">
    <div id="shopping-cart">
        <div class="shopping-cart-list">
 <?php    foreach ($_SESSION['cart'] as $row)  {?>
            <div class="product product-widget">
                <div class="product-thumb">
                    <img src="produits/<?php echo $pro->afficherproduit(json_decode($row, true)["id"])->fetch()['image']; ?>" alt="">
                </div>
                <div class="product-body">
                    <h3 class="product-price"><?php echo json_decode($row, true)["prix"]; ?>
                    <span class="qty"><?php echo json_decode($row, true)["quantite"]; ?></span></h3>
                    <h2 class="product-name"><a href="#"><?php echo json_decode($row, true)["name"]; ?></a></h2>
                </div>
                <button onclick="removeFromCart('<?php echo json_decode($row, true)["id"]; ?>')" class="cancel-btn"><i class="fa fa-trash"></i></button>
            </div>
           <?php } ?>
        </div>
        <div class="shopping-cart-btns">
            <button class="main-btn" onclick="location.href='checkout.php'">View Cart</button>
            <button class="primary-btn" onclick="location.href='checkout.php'">Checkout <i class="fa fa-arrow-circle-right"></i></button>
        </div>
    </div>
</div>
</li>
</div>
<?php } ?>
