<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./asset/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/account.css">
    <title>TransQuicki / register</title>
</head>
<body>
    <div class="container">
        <section class="welcome">
            <div class="header">
                <a href="index.php"><img src="./asset/Logo.png" alt=""></a>
                <ul>
                    <a href="login.php"><button>Sign in</button></a>
                    <a href="admin.php"><button>Admin</button></a>
                </ul>
            </div>
            <div class="welcome-content" id="/">
                <form action="php/register.php" method="POST">
                    <h3>Sign up</h3>
                    <p1>Welcome to transquicki app Sign up to acess premium features</p>
                        <input type="text" name="username" id="" placeholder="Fullname">
                        <input type="email" name="email" id="" placeholder="Email">
                        <input type="number" name="phonenumber" id="" placeholder="Phone number">
                        <select name="location" id="">
                            <option value="">Location</option>
                            <option value="">Kigali</option>
                            <option value="">South</option>
                            <option value="">Noth</option>
                            <option value="">East</option>
                            <option value="">West</option>
                        </select>
                        <input type="password" name="password" id="" placeholder="password">
                        <input type="password" name="password1" id="" placeholder="Confirm password">
                        <input type="submit" name="addUser" value="Sign up" >

                    <p1>Already have account please <a href="login.php">Sign in</a> here</p1>
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
