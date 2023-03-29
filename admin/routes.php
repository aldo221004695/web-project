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
    <title>Routes Dashboard</title>
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
            <p>All Cars</p>
            <h1>12</h1>
        </div>
        <div class="card">
            <p>Buses</p>
            <h1>12</h1>
        </div>
        <div class="card">
            <p>Privates</p>
            <h1>12</h1>
        </div>
        <div class="card">
            <p>Cabs</p>
            <h1>12</h1>
        </div>
        <div class="card">
            <p>MVP</p>
            <h1>12</h1>
        </div>
    </div>
    <div class="info-message">
        <?php
        $id = $_SESSION['id'];
        $retrieve = "SELECT * FROM administrator WHERE id = $id";
        $query = mysqli_query( $con, $retrieve);
        while($row = mysqli_fetch_array($query)){?>
            <h1>Hey <?php echo $row['Username']; ?>, This is Routes page</h1>
        <?php } ?>
    </div>
    <div class="info-data">
        <div class="left-data">
        <table>
            <tr>
                <th>#</th>
                <th>From</th>
                <th>To</th>
                <th>Price</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php
        $id = $_SESSION['id'];
        $retrieve = "SELECT * FROM journey";
        $query = mysqli_query( $con, $retrieve);
        while($row = mysqli_fetch_array($query)){?>
            <tr>
                <th>1</th>
                <th><?php echo $row['startTravel']; ?></th>
                <th><?php echo $row['arrivalTravel']; ?></th>
                <th><?php echo $row['Price']; ?></th>
                <th class="edit"><a href="php/editRoute.php?routeId=<?php echo $row['id']; ?>"> Edit </a></th>
                <th class="delete"><a href="php/deleteRoute.php?routeId=<?php echo $row['id']; ?>"> Delete </a></th>
            </tr>
            <?php } ?>
        </table>
        </div>
        <div class="right-data">
            <h1>Add Routes</h1>
            <form action="php/AddRoute.php" method="POST">
                <label for="">From</label><br><br>
                <select name="fromDestiny">
                    <option value="">Select your type</option>
                    <?php
                        $id = $_SESSION['id'];
                        $retrieve = "SELECT * FROM `location`";
                        $query = mysqli_query( $con, $retrieve);
                        while($row = mysqli_fetch_array($query)){?>
                    <option value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>
                        <?php } ?>
                </select><br><br>
                <label for="">To</label><br><br>
                <select name="toDestiny">
                    <option value="">Select your type</option>
                    <?php
                        $id = $_SESSION['id'];
                        $retrieve = "SELECT * FROM `location`";
                        $query = mysqli_query( $con, $retrieve);
                        while($row = mysqli_fetch_array($query)){?>
                    <option value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>
                    <?php } ?>
                </select><br><br>
                <label for="">Price</label><br><br>
                <input type="number" required name="price" placeholder="Price"><br><br>
                <input type="submit" name="addRoute" value="Add Route" class="submit"><br><br>
            </form>
        </div>
    </div>
</section>
</body>
</html>