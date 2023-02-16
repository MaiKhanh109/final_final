<!-- Define page title here -->
<?php $title = 'Contact' ?>

<!-- Include require data in this file -->
<?php include 'layouts/components.php'; ?>

<!-- Include specified controller here-->
<?php include '../../controllers/user/contact.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'layouts/meta.php'; ?>

<body>
    <?php include 'layouts/header.php'; ?>
    <!-- CONTENT GOES HERE -->
    <section class="contact">

        <form action="" method="post">
            <h3>get in touch</h3>
            <input type="text" name="name" placeholder="enter your name" required maxlength="20" class="box">
            <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">
            <input type="number" name="number" min="0" max="9999999999" placeholder="enter your number" required onkeypress="if(this.value.length == 10) return false;" class="box">
            <textarea name="msg" class="box" placeholder="enter your message" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" name="send" class="btn">
        </form>

    </section>
    <script src = "js/script.js"></script>
</body>

<?php include 'layouts/footer.php'; ?>

</html>