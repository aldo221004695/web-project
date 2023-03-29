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
    <title>Cars Dashboard</title>
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
            <h1>Hey <?php echo $row['Username']; ?>, This is Cars page</h1>
        <?php } ?>
    </div>
    <div class="info-data">
        <div class="left-data">
        <table>
            <tr>
                <th>#</th>
                <th>Plate</th>
                <th>Type of Car</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created Time</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php
        $id = $_SESSION['id'];
        $retrieve = "SELECT * FROM cars";
        $query = mysqli_query( $con, $retrieve);
        while($row = mysqli_fetch_array($query)){?>
            <tr>
                <th>1</th>
                <th><?php echo $row['PlateNo']; ?></th>
                <th><?php echo $row['Type']; ?></th>
                <th><?php echo $row['price']; ?></th>
                <th><?php echo $row['Quantity']; ?></th>
                <th><?php echo $row['createdTime']; ?></th>
                <th class="edit"><a href="php/editCar.php?carId=<?php echo $row['id']; ?>"> Edit </a></th>
                <th class="delete"><a href="php/deleteCar.php?carId=<?php echo $row['id']; ?>"> Delete </a></th>
            </tr>
            <?php } ?>
        </table>
        </div>
        <div class="right-data">
        <h1>Add car Category</h1>
            <form action="php/AddCarCat.php" method="POST">
                <input type="text" required name="typeOfCar" placeholder="Type Of Car"><br><br>
                <input type="submit" name="addCarCategory" value="Add Category" class="submit"><br><br>
            </form>
            <h1>Add car Details</h1>
            <form action="php/AddCar.php" method="POST">
                <input type="text" required name="plate" placeholder="Plate number"><br><br>
                        <select name="typeOfCar">
                            <option value="">Select your type</option>
                <?php
                    $id = $_SESSION['id'];
                    $retrieve = "SELECT * FROM carcategory";
                    $query = mysqli_query( $con, $retrieve);
                    while($row = mysqli_fetch_array($query)){?>
                            <option value="<?php echo $row['CategoryTitle']; ?>"><?php echo $row['CategoryTitle']; ?></option>
                            <?php } ?>
                        </select><br><br>
                <input type="number" required name="price" placeholder="Price"><br><br>
                <input type="number" required name="quantity" placeholder="Quantity"><br><br>
                <input type="submit" name="addCar" value="Add Cars" class="submit"><br><br>
            </form>
        </div>
    </div>
</section>
</body>
</html>