<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        // User is not logged in, redirect to the login page
        header('Location: ../admin.php');
        exit;
    }
    include '../php/connect.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/dashboard.css">
</head>
<body>
<div class="header">
    <a href="dashboard.php"><img src="../asset/Logo.png" alt=""></a>
    <ul>
        <a href="dashboard.php"><li>Home</li></a>
        <a href="booking.php"><li>Booking</li></a>
        <a href="cars.php"><li>Cars</li></a>
        <a href="clients.php"><li>clients</li></a>
        <a href="drivers.php"><li>Drivers</li></a>
        <a href="routes.php"><li>Routes</li></a>
        <a href="location.php"><li>location</li></a>
        <a href="profile.php"><button>Profile</button></a>
        <a href="php/logout.php"><button>Logout</button></a>
    </ul>
</div>
<section class="Welcome-admin">
    <div class="info-cards">
        <div class="card">
            <p>Books</p>
            <h1>12</h1>
        </div>
        <div class="card">
            <p>Cars</p>
            <h1>12</h1>
        </div>
        <div class="card">
            <p>Clients</p>
            <h1>12</h1>
        </div>
        <div class="card">
            <p>Routes</p>
            <h1>12</h1>
        </div>
        <div class="card">
            <p>Location</p>
            <h1>12</h1>
        </div>
    </div>
    <div class="info-message">
        <?php
        $id = $_SESSION['id'];
        $retrieve = "SELECT * FROM administrator WHERE id = $id";
        $query = mysqli_query( $con, $retrieve);
        while($row = mysqli_fetch_array($query)){?>
            <h1>Welcome on <?php echo $row['Username']; ?> dashboard</h1>
        <?php } ?>
    </div>
</section>
</body>
</html>