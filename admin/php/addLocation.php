<?php
    include('../../php/connect.php');
    if(isset($_POST['addLocation'])){
        $title = $_POST['title'];

        $addLocation = "INSERT INTO `Location` VALUE(NULL, '$title', now())";
        $query = mysqli_query($con, $addLocation);

        if($query){
            echo "<script>alert('Location $title added '), window.location.replace('../location.php')</script>";
        }
        else{
            echo "<script>alert('Location $title already exist '), window.location.replace('../location.php')</script>";
        }
    }
?>