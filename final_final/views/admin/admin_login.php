<!-- Define page title here -->
<?php $title = 'Admin Login' ?>

<!-- Include require data in this file -->
<?php include '../../models/connect.php'; ?>

<!-- Include specified controller here-->
<?php include '../../controllers/admin/admin_login.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'layouts/meta.php'; ?>

<body>
    <?php include 'layouts/header.php'; ?>
    <!-- CONTENT GOES HERE -->
<section class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <p>default username = <span>admin</span> & password = <span>111</span></p>
      <input type="text" name="name" required placeholder="enter your username" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="login now" class="btn" name="submit">
   </form>

</section>
</body>

</html>