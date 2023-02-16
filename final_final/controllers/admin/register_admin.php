<?php
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = sha1($_POST['cpass']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
 
    $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ?");
    $select_admin->execute([$name]);
 
    if($select_admin->rowCount() > 0){
       $message[] = 'username already exist!';
    }else{
       if($pass != $cpass){
          $message[] = 'confirm password not matched!';
       }else{
          $insert_admin = $conn->prepare("INSERT INTO `admins`(name, password) VALUES(?,?)");
          $insert_admin->execute([$name, $cpass]);
          $message[] = 'new admin registered successfully!';
       }
    }
 
 }
?>