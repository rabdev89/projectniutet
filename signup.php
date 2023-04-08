<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="signup-check.php" method="post">
        <h1>SIGN UP</h1>
        <?php if (isset($_GET['error'])){?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php }?>
        
        <?php if (isset($_GET['success'])){?>
        <p class="success"><?php echo $_GET['success']; ?></p>
        <?php }?>

        <label>Email</label>
        <?php if (isset($_GET['Email'])){?>
        <input type="text"
         name="Email" 
         placeholder="Email"
         value="<?php echo $_GET['Email']; ?>"><br>
        <?php }else{?>
            <input type="text" 
                   name="Email" 
                   placeholder="Email"><br>
        <?php }?>     

        <label>Username</label>
        <?php if (isset($_GET['USER'])){?>
        <input type="text"
         name="USER" 
         placeholder="Username"
         value="<?php echo $_GET['USER']; ?>"><br>
        <?php }else{?>
            <input type="text" 
                   name="USER" 
                   placeholder="Username"><br>
        <?php }?>    

      

        <label>Password</label>
        <input type="password" 
               name="PASSKEY" 
               placeholder="Password"><br>

        <label>Confirm Password</label>
        <input type="password" 
               name="RE_PASSKEY" 
               placeholder="RE_PASSKEY"><br>

        <button type ="submit">Register</button>
        <a href ="index.php" class="ka">Already have an account?<a>
    </form>
</body>
</html>