<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./asset/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/account.css">
    <title>TransQuicki / login</title>
</head>
<body>
    <div class="container">
        <section class="welcome">
            <div class="header">
                <a href="index.php"><img src="./asset/Logo.png" alt=""></a>
                <ul>
                    <a href="register.php"><button>Register</button></a>
                    <a href="admin.php"><button>Admin</button></a>
                </ul>
            </div>
            <div class="welcome-content" id="/">
                <form action="php/login.php" method="POST">
                    <h3>Sign in</h3>
                    <p1>Add your credintially to acess premium features</p>
                    <input type="text" name="email" id="" placeholder="example@gmail.com">
                    <input type="text" name="password" id="" placeholder="Password">
                    <input type="submit" name="SignIn" value="Sign in" >

                    <p1>if you don't have account please <a href="register.php">Sign up</a> here</p1>
                </form>
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
