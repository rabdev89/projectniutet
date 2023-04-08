<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGINPAGE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="login.php" method="post">
        <h1>LOGIN</h1>
        <?php if (isset($_GET['error'])){?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php }?>
        <label>Username</label>
        <input type="text" name="USER" placeholder="Username">

        <label>Password</label>
        <input type="password" name="PASSKEY" placeholder="Password">
        <button type ="submit">Log in</button>
        <a href ="signup.php" class="ka">Want to sign up?<a>
    </form>
</body>
</html>