<?php
    include('../../php/connect.php');
    if(isset($_POST['addUser'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $location = $_POST['location'];
        $password = $_POST['password'];
        $password1 = $_POST['password1'];

        if($password !== $password1){
            echo "<script>alert('Password does not match'), window.location.replace('../register.php')</script>";
        } 
        elseif($username === '' && $email === '' && $phonenumber === '' && $location === '' && $password === ''){
        echo "<script>alert('Make sure you fill all the form'), window.location.replace('../register.php')</script>";
        }
        else{
        $insert = "INSERT INTO clients VALUE (NULL, '$username', '$email', '$phonenumber', '$location', '$password')";
        $query = mysqli_query($con, $insert);
        if($query){
            echo "<script>alert('$username account created '), window.location.replace('../clients.php')</script>";
        }
        else{
            echo "<script>alert('$username already exist!'), window.location.replace('../clients.php')</script>";
        }
        }
    }
?>