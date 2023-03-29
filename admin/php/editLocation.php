<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        // User is not logged in, redirect to the login page
        header('Location: ../../login.php');
        exit;
    }
    include('../../php/connect.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../asset/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <title>Admin | TransQuicki</title>
</head>
<body>
    <div class="container">
        <section class="welcome">
            <div class="header">
                <a href="dashboard.php"><img src="../../asset/Logo.png" alt=""></a>
                <ul>
                    <a href="../dashboard.php"><li>Home</li></a>
                    <a href="../booking.php"><li>Booking</li></a>
                    <a href="../cars.php"><li>Cars</li></a>
                    <a href="../clients.php"><li>clients</li></a>
                    <a href="../drivers.php"><li>Drivers</li></a>
                    <a href="../routes.php"><li>Routes</li></a>
                    <a href="../location.php"><li>location</li></a>
                    <a href="../profile.php"><button>Profile</button></a>
                    <a href="./logout.php"><button>Logout</button></a>
                </ul>
            </div>
            <div class="welcome-content" id="/">
                <h1>Update <span>TransQuicki</span> Car </h1>
                <p>
                    Reliable - Efficient - Safe - Responsive - Innovative
                </p>
                <?php
                    if(isset($_GET['locId'])){
                    $id = $_GET['locId'];
                    echo "$id";
                    $retrieve = "SELECT * FROM `location` WHERE id = $id";
                    $query = mysqli_query($con, $retrieve);
                    while($row = mysqli_fetch_array($query)){
                        ?>
                            <form action="" method="POST">
                                <label for="">Location name</label>
                                <input type="text" name="Name" value="<?php echo $row['Name']; ?>"><br><br>
                                <input type="submit" name="editLocation" value="Update Location"><br><br>
                            </form>

                        <?php
                    }
                }
                ?>
               

            </div>

        </section>


        <section class="about" id="about">
                <div class="container">
                    <div class="grid">
                        <h1>About Us</h1>
                        <p><span>TransQuicki </span>App it the gamechanger that will help in grid and have ability to streamline its operations and optimize its resources to provide customers with cost-effective and timely transportation services. and company's commitment to ensuring the safety of its drivers, passengers, and cargo during transport. and quickly adapt to changing customer needs and market trends.</p>
                        <span>
                            <a href="book.php"><button>Book car</button></a>
                            <a href="#contact"><button>Contact us</button></a>
                        </span>
                    </div>
                    <div class="grid">
                        .<img src="../../asset/mangopear-creative-w8kIQEU34Po-unsplash.jpg" alt="">
                    </div>
                </div>
        </section>

      

        <section class="contact" id="contact">
            <div class="left">
                <img src="/asset/waldemar-kYbYIWdJRh0-unsplash.jpg" alt="">
            </div>
            <div class="right">
                <h1>Contact us</h1>
                <br><br>
                <h2>Email</h2>
                <p>transiquicki@gmail.com</p>
                <h2>phone</h2>
                <p>+250 788 921 533</p>
                <h2>Location</h2>
                <p>Kigali, Nyarugenge kg 567 st</p>
            </div>
        </section>

        <section class="footer">
            <hr>
            <br>
            <h1>Copyright &copy; 2023 All rights reserved</h1>
        </section>
    </div>
</body>
</html>

<?php
    if(isset($_POST['editLocation'])){
        $id = $_GET['locId'];
        $Name = $_POST['Name'];
        $edit = "UPDATE `location` SET Name='$Name' WHERE id = $id";
        $query = mysqli_query($con, $edit);

        if($query){
            echo "<script>alert('location $Name updated '), window.location.replace('../location.php')</script>";
        }
        else{
            echo "<script>alert('location $Name failed update '), window.location.replace('./location.php')</script>";
        }        
    }
?>