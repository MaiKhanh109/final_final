<!-- Define page title here -->
<?php $title = 'Cart' ?>

<!-- Include require data in this file -->
<?php include 'layouts/components.php'; ?>

<!-- Include specified controller here-->
<?php include '../../controllers/user/cart.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'layouts/meta.php'; ?>

<body>
    <?php include 'layouts/header.php'; ?>
    <!-- CONTENT GOES HERE -->
    <section class="products shopping-cart">

<h3 class="heading">shopping cart</h3>

<div class="box-container">

<?php
   $grand_total = 0;
   $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $select_cart->execute([$user_id]);
   if($select_cart->rowCount() > 0){
      while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
?>
<form action="" method="post" class="box">
   <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
   <a href="quick_view.php?pid=<?= $fetch_cart['pid']; ?>" class="fas fa-eye"></a>
   <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt="">
   <div class="name"><?= $fetch_cart['name']; ?></div>
   <div class="flex">
      <div class="price">$<?= $fetch_cart['price']; ?>/-</div>
      <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="<?= $fetch_cart['quantity']; ?>">
      <button type="submit" class="fas fa-edit" name="update_qty"></button>
   </div>
   <div class="sub-total"> sub total : <span>$<?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</span> </div>
   <input type="submit" value="delete item" onclick="return confirm('delete this from cart?');" class="delete-btn" name="delete">
</form>
<?php
$grand_total += $sub_total;
   }
}else{
   echo '<p class="empty">your cart is empty</p>';
}
?>
</div>

<div class="cart-total">
   <p>grand total : <span>$<?= $grand_total; ?>/-</span></p>
   <a href="shop.php" class="option-btn">continue shopping</a>
   <a href="cart.php?delete_all" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all item</a>
   <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
</div>

</section>

<script src = "js/script.js"></script>
</body>

<?php include 'layouts/footer.php'; ?>

</html>