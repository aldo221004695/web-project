<?php
session_start();
if (!isset($_SESSION['id'])) {
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
    <title>Booking Dashboard</title>
    <link rel="stylesheet" href="./css/dashboard.css">
</head>

<body>
    <div class="header">
        <a href="dashboard.php"><img src="../asset/Logo.png" alt=""></a>
        <ul>
            <a href="dashboard.php">
                <li>Home</li>
            </a>
            <a href="booking.php">
                <li>Booking</li>
            </a>
            <a href="cars.php">
                <li>Cars</li>
            </a>
            <a href="clients.php">
                <li>clients</li>
            </a>
            <a href="drivers.php">
                <li>Drivers</li>
            </a>
            <a href="routes.php">
                <li>Routes</li>
            </a>
            <a href="location.php">
                <li>location</li>
            </a>
            <a href="profile.php"><button>Profile</button></a>
            <a href="php/logout.php"><button>Logout</button></a>
        </ul>
    </div>
    <section class="Welcome-admin">
        <div class="info-message">
            <?php
            $id = $_SESSION['id'];
            $retrieve = "SELECT * FROM administrator WHERE id = $id";
            $query = mysqli_query($con, $retrieve);
            while ($row = mysqli_fetch_array($query)) { ?>
                <h1>Hey <?php echo $row['Username']; ?>, This is Booking page</h1>
            <?php } ?>
        </div>
        <div class="info-data">
            <div class="left-data">
                <br>
                <h1>Book VIP Car</h1>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Clients Name</th>
                        <th>Quantity</th>
                        <th>Duration</th>
                        <th>Book Time</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    <?php
                    $id = $_SESSION['id'];
                    $retrieve = "SELECT * FROM bookcar";
                    $query = mysqli_query($con, $retrieve);
                    while ($row = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td>1</td>
                            <td>
                                <?php
                                $clientId = $row['clients'];
                                $retrieve1 = "SELECT * FROM clients WHERE id='$clientId'";
                                $query1 = mysqli_query($con, $retrieve1);
                                while ($data = mysqli_fetch_array($query1)) {
                                    echo $data['Username'];
                                }

                                ?>
                            </td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['days']; ?></td>
                            <td><?php echo $row['bookedTime']; ?></td>
                            <td class="edit"><a href="php/editClient.php?ClientId=<?php echo $row['id']; ?>"> Apprroved </a></td>
                            <td class="delete"><a href="php/deleteClient.php?ClientId=<?php echo $row['id']; ?>"> Cancel </a></td>
                        </tr>
                    <?php } ?>
                </table>


                <br>
                <h1>Book Bus</h1>
                <table>
                    <tr>
                        <thth>#</thth>
                        <th>Clients Name</th>
                        <th>Journey</th>
                        <th>Book Time</th>
                        <th>Start Time</th>
                        <th>Arrival Time</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    <?php
                    $id = $_SESSION['id'];
                    $retrieve = "SELECT * FROM booking";
                    $query = mysqli_query($con, $retrieve);
                    while ($row = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <th>1</th>
                            <th>
                                <?php
                                $clientId = $row['client'];
                                $retrieve2 = "SELECT * FROM clients WHERE id='$clientId'";
                                $query2 = mysqli_query($con, $retrieve2);
                                while ($data = mysqli_fetch_array($query2)) {
                                    echo $data['Username'];
                                }

                                ?>
                            </th>
                            <th><?php echo $row['journeyId']; ?></th>
                            <th><?php echo $row['booktime']; ?></th>
                            <th><?php echo $row['startime']; ?></th>
                            <th><?php echo $row['arrivaltime']; ?></th>
                            <th class="edit"><a href="php/editClient.php?ClientId=<?php echo $row['id']; ?>"> Apprroved </a></th>
                            <th class="delete"><a href="php/deleteClient.php?ClientId=<?php echo $row['id']; ?>"> Cancel </a></th>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </section>
</body>

</html>