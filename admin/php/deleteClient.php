<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        // User is not logged in, redirect to the login page
        header('Location: ../../login.php');
        exit;
    }
    include('../../php/connect.php');
    if(isset($_GET['ClientId'])){
        $id = $_GET['ClientId'];
        $deleteClients = "DELETE FROM clients WHERE id = $id";
        $query = mysqli_query($con, $deleteClients);

        if($query){
            echo "<script>alert('Clients deleted '), window.location.replace('../clients.php')</script>";
        }
        else{
            echo "<script>alert('Clients failed deletion '), window.location.replace('../clients.php')</script>";
        }        
    }
?>
