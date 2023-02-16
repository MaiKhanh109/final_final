<!-- Define page title here -->
<?php $title = 'Category' ?>

<!-- Include require data in this file -->
<?php include 'layouts/components.php'; ?>


<!DOCTYPE html>
<html lang="en">
<?php include 'layouts/meta.php'; ?>

<body>
    <?php include 'layouts/header.php'; ?>
    <?php include '../../controllers/user/wishlist.php'; ?>
    <!-- CONTENT GOES HERE -->
    <section class="products">

<h1 class="heading">category</h1>

<div class="box-container">

<?php
  $category = $_GET['category'];
  $select_products = $conn->prepare("SELECT * FROM `products` WHERE name LIKE '%{$category}%'"); 
  $select_products->execute();
  if($select_products->rowCount() > 0){
   while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
?>
<form action="" method="post" class="box">
   <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
   <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
   <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
   <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
   <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
   <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
   <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
   <div class="name"><?= $fetch_product['name']; ?></div>
   <div class="flex">
      <div class="price"><span>$</span><?= $fetch_product['price']; ?><span>/-</span></div>
      <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
   </div>
   <input type="submit" value="add to cart" class="btn" name="add_to_cart">
</form>
<?php
   }
}else{
   echo '<p class="empty">no products found!</p>';
}
?>

</div>

</section>
<script src = "js/script.js"></script>
</body>

<?php include 'layouts/footer.php'; ?>

</html>