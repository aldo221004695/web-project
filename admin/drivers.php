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
    <title>Drivers Dashboard</title>
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
    <div class="info-message">
        <?php
        $id = $_SESSION['id'];
        $retrieve = "SELECT * FROM administrator WHERE id = $id";
        $query = mysqli_query( $con, $retrieve);
        while($row = mysqli_fetch_array($query)){?>
            <h1>Hey <?php echo $row['Username']; ?>, This is Drivers page</h1>
        <?php } ?>
    </div>
    <div class="info-data">
        <div class="left-data">
        <table>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Gender</th>
                <th>Bus No</th>
                <th>Password</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php
        $id = $_SESSION['id'];
        $retrieve = "SELECT * FROM drivers";
        $query = mysqli_query( $con, $retrieve);
        while($row = mysqli_fetch_array($query)){?>
            <tr>
                <th>1</th>
                <th><?php echo $row['Username']; ?></th>
                <th><?php echo $row['Email']; ?></th>
                <th><?php echo $row['Phone']; ?></th>
                <th><?php echo $row['Gender']; ?></th>
                <th><?php echo $row['BusNo']; ?></th>
                <th><?php echo $row['Pasword']; ?></th>
                <th class="edit"><a href="php/editDriver.php?DriverId=<?php echo $row['id']; ?>"> Edit </a></th>
                <th class="delete"><a href="php/deleteDriver.php?DriverId=<?php echo $row['id']; ?>"> Delete </a></th>
            </tr>
            <?php } ?>
        </table>
        </div>
        <div class="right-data">
            <h1>Add driver Details</h1>
            <form action="php/AddDriver.php" method="POST">
                <input type="text" required name="username" placeholder="Username"><br><br>
                <input type="text" required name="email" placeholder="Email"><br><br>
                <input type="number" required name="phone" placeholder="Phone number"><br><br>
                <input type="text" required name="gender" placeholder="Gender"><br><br>
                <select name="typeOfCar">
                            <option value="">Select car</option>
                <?php
                    $id = $_SESSION['id'];
                    $retrieve = "SELECT * FROM cars";
                    $query = mysqli_query( $con, $retrieve);
                    while($row = mysqli_fetch_array($query)){?>
                        <option value="<?php echo $row['Type']; ?>"><?php echo $row['Type']; ?></option>
                    <?php } ?>
                        </select><br><br>
                <input type="text" required name="password" placeholder="Password"><br><br>                        
                <input type="submit" name="AddDriver" value="Add Drivers" class="submit"><br><br>
            </form>
        </div>
    </div>
</section>
</body>
</html>