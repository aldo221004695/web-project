<?php
session_start();
if (!isset($_SESSION['id'])) {
    // User is not logged in, redirect to the login page
    header('Location: ../login.php');
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
    <link rel="shortcut icon" href="../asset/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="./css/BookForm.css">

    <title>Book Car | TransQuicki</title>
</head>

<body>
    <div class="container">
        <section class="welcome">
            <div class="header">
                <a href="index.php"><img src="../asset/Logo.png" alt=""></a>
                <ul>
                    <a href="index.php">
                        <li>Home</li>
                    </a>
                    <a href="#about">
                        <li>About</li>
                    </a>
                    <a href="#services">
                        <li>Services</li>
                    </a>
                    <a href="#contact">
                        <li>Contact</li>
                    </a>
                    <a href="profile.php"><button>Profile</button></a>
                    <a href="php/logout.php"><button>Logout</button></a>
                </ul>
            </div>
        </section>



        <section class="book" id="services">
            <br><br><br><br><br><br>
            <div class="grid-container">
                <?php
                $id = $_GET['CarId'];
                $retrieve = "SELECT * FROM cars WHERE id=$id";
                $query = mysqli_query($con, $retrieve);
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="grid-item">
                        <img src="../asset/dima-panyukov-DwxlhTvC16Q-unsplash.jpg" alt="">
                        <div class="text1">


                        </div>
                        <div class="text2">
                            <button><?php echo $row['PlateNo']; ?></button>
                            <button>AUTO</button>
                            <button>AC</button>
                        </div>
                    </div>
                    </a>

                    <form action="addBooking.php" method="POST" class="BookForm">
                        <h1>Car name: <?php echo $row['Type']; ?></h1>
                        <br>
                        <h1>Car Price<?php echo $row['price']; ?>Rwf / DAy</h1>
                        <br>
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" value="1"><br><br>
                        <p>There is <b><?php echo $row['Quantity']; ?></b> in garage</p><br>
                        <label>Days</label>
                        <input type="number" name="day" value="1"><br><br>
                        <input type="submit" name="addBbook" class="submit" value="Book now">
                    </form>
                <?php


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
                    <img src="../asset/mangopear-creative-w8kIQEU34Po-unsplash.jpg" alt="">
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