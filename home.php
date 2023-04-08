<?php
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['USER'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>HOMEPAGE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <h1>HELLO,<?php echo $_SESSION['USER']; ?></h1>
   <a href="logout.php">LOGOUT<a>
</body>
</html>

<?php
}else{
    header("Location:index.php");
    exit();
}
?>