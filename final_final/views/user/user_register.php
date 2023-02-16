<!-- Define page title here -->
<?php $title = 'User Register' ?>

<!-- Include require data in this file -->
<?php include 'layouts/components.php'; ?>

<!-- Include specified controller here-->
<?php include '../../controllers/user/user_register.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'layouts/meta.php'; ?>

<body>
    <?php include 'layouts/header.php'; ?>
    <!-- CONTENT GOES HERE -->
    <section class="form-container">

<form action="" method="post">
   <h3>register now</h3>
   <input type="text" name="name" required placeholder="enter your username" maxlength="20"  class="box">
   <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
   <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
   <input type="password" name="cpass" required placeholder="confirm your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
   <input type="submit" value="register now" class="btn" name="submit">
   <p>already have an account?</p>
   <a href="user_login.php" class="option-btn">login now</a>
</form>

</section>
<script src="js/script.js"></script>
</body>

<?php include 'layouts/footer.php'; ?>

</html>