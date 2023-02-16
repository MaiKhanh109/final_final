<!-- Define page title here -->
<?php $title = 'User Login' ?>

<!-- Include require data in this file -->
<?php include 'layouts/components.php'; ?>

<!-- Include specified controller here-->
<?php include '../../controllers/user/user_login.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'layouts/meta.php'; ?>

<body>
    <?php include 'layouts/header.php'; ?>
    <!-- CONTENT GOES HERE -->
    <section class="form-container">

<form action="" method="post">
   <h3>login now</h3>
   <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
   <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
   <input type="submit" value="login now" class="btn" name="submit">
   <p>don't have an account?</p>
   <a href="user_register.php" class="option-btn">register now</a>
</form>

</section>
<script src="js/script.js"></script>
</body>

<?php include 'layouts/footer.php'; ?>

</html>