<!-- Define page title here -->
<?php $title = 'Check Out' ?>

<!-- Include require data in this file -->
<?php include 'layouts/components.php'; ?>

<!-- Include specified controller here-->
<?php include '../../controllers/user/checkout.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'layouts/meta.php'; ?>

<body>
    <?php include 'layouts/header.php'; ?>
    <!-- CONTENT GOES HERE -->
    <section class="checkout-orders">

<form action="" method="POST">

<h3>your orders</h3>

   <div class="display-orders">
   <?php
      $grand_total = 0;
      $cart_items[] = '';
      $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $select_cart->execute([$user_id]);
      if($select_cart->rowCount() > 0){
         while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
            $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].') - ';
            $total_products = implode($cart_items);
            $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
   ?>
      <p> <?= $fetch_cart['name']; ?> <span>(<?= '$'.$fetch_cart['price'].'/- x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
         }
      }else{
         echo '<p class="empty">your cart is empty!</p>';
      }
   ?>
      <input type="hidden" name="total_products" value="<?= $total_products; ?>">
      <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
      <div class="grand-total">grand total : <span>$<?= $grand_total; ?>/-</span></div>
   </div>

   <h3>place your orders</h3>

   <div class="flex">
      <div class="inputBox">
         <span>your name :</span>
         <input type="text" name="name" placeholder="enter your name" class="box" maxlength="20" required>
      </div>
      <div class="inputBox">
         <span>your number :</span>
         <input type="number" name="number" placeholder="enter your number" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
      </div>
      <div class="inputBox">
         <span>your email :</span>
         <input type="email" name="email" placeholder="enter your email" class="box" maxlength="50" required>
      </div>
      <div class="inputBox">
         <span>payment method :</span>
         <select name="method" class="box" required>
            <option value="cash on delivery">cash on delivery</option>
            <option value="credit card">credit card</option>
            <option value="paytm">paytm</option>
            <option value="paypal">paypal</option>
         </select>
      </div>
      <div class="inputBox">
         <span>address line 01 :</span>
         <input type="text" name="flat" placeholder="e.g. flat number" class="box" maxlength="50" required>
      </div>
      <div class="inputBox">
         <span>address line 02 :</span>
         <input type="text" name="street" placeholder="e.g. street name" class="box" maxlength="50" required>
      </div>
      <div class="inputBox">
         <span>city :</span>
         <input type="text" name="city" placeholder="e.g. mumbai" class="box" maxlength="50" required>
      </div>
      <div class="inputBox">
         <span>state :</span>
         <input type="text" name="state" placeholder="e.g. maharashtra" class="box" maxlength="50" required>
      </div>
      <div class="inputBox">
         <span>country :</span>
         <input type="text" name="country" placeholder="e.g. India" class="box" maxlength="50" required>
      </div>
      <div class="inputBox">
         <span>pin code :</span>
         <input type="number" min="0" name="pin_code" placeholder="e.g. 123456" min="0" max="999999" onkeypress="if(this.value.length == 6) return false;" class="box" required>
      </div>
   </div>

   <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="place order">

</form>

</section>
<script src = "js/script.js"></script>
</body>

<?php include 'layouts/footer.php'; ?>

</html>