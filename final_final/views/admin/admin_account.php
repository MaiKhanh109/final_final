<!-- Define page title here -->
<?php $title = 'Admin Account' ?>

<!-- Include require data in this file -->
<?php include 'layouts/components.php'; ?>

<!-- Include specified controller here-->
<?php include '../../controllers/admin/admin_account.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'layouts/meta.php'; ?>

<body>
    <?php include 'layouts/header.php'; ?>
    <!-- CONTENT GOES HERE -->
    <section class="accounts">

<h1 class="heading">admin accounts</h1>

<div class="box-container">

<div class="box">
   <p>add new admin</p>
   <a href="register_admin.php" class="option-btn">register admin</a>
</div>

<?php
   $select_accounts = $conn->prepare("SELECT * FROM `admins`");
   $select_accounts->execute();
   if($select_accounts->rowCount() > 0){
      while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){   
?>
<div class="box">
   <p> admin id : <span><?= $fetch_accounts['id']; ?></span> </p>
   <p> admin name : <span><?= $fetch_accounts['name']; ?></span> </p>
   <div class="flex-btn">
      <a href="admin_account.php?delete=<?= $fetch_accounts['id']; ?>" onclick="return confirm('delete this account?')" class="delete-btn">delete</a>
      <?php
         if($fetch_accounts['id'] == $admin_id){
            echo '<a href="update_profile.php" class="option-btn">update</a>';
         }
      ?>
   </div>
</div>
<?php
      }
   }else{
      echo '<p class="empty">no accounts available!</p>';
   }
?>

</div>

</section>
</body>

</html>