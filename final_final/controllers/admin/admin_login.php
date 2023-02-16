<?php
session_start();
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
 
    $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ?");
    $select_admin->execute([$name, $pass]);
    $row = $select_admin->fetch(PDO::FETCH_ASSOC);
 
    if($select_admin->rowCount() > 0){
       $_SESSION['admin_id'] = $row['id'];
       header('location:dashboard.php');
    }else{
       $message[] = 'incorrect username or password!';
    }
 
 } 
?>