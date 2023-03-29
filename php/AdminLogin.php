<?php
    session_start();
    include('connect.php');
    if(isset($_POST['SignIn'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $retrieve = "SELECT * FROM administrator WHERE email='$email' AND password='$password'";
        $query = mysqli_query($con, $retrieve);

        
        // Check if the query returned any rows
        if (mysqli_num_rows($query) == 1) {
            // User is authenticated, store their information in session variables
            $row = mysqli_fetch_assoc($query);
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            // Redirect the user to the secure page

            header('Location: ../admin/dashboard.php');
            exit;
          } else {
            // Invalid username or password, show an error message
            echo "<script>alert('Invalid Credentialias'), window.location.replace('../admin.php')</script>";
          }
    }
?>