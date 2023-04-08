<?php
session_start();
include "db_conn.php";

if (isset($_POST['USER']) && isset($_POST['PASSKEY'])) {
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } 
  

    $USER = validate($_POST['USER']);
    $PASSKEY = validate($_POST['PASSKEY']);
    
    if (empty($USER)) {
        header("Location:index.php?error=Username is required");
        exit();
    }else if(empty($PASSKEY)){
        header("Location:index.php?error=Password is required");
        exit();
    }else {
        $PASSKEY=md5($PASSKEY);
        
        $sql = "SELECT * FROM users WHERE USER= '$USER'
        AND PASSKEY='$PASSKEY'";

        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['USER'] === $USER && $row['PASSKEY'] === $PASSKEY) {
               $_SESSION['USER'] = $row['USER'];
               $_SESSION['ID'] = $row['ID'];
               header("Location:home.php");
               exit();
            }else{
                header("Location:index.php?error=Incorrect username or password");
                exit();
            }
        }else{
            header("Location:index.php?error=Incorrect username or password");
            exit();
        }
    }
    

}else{
    header("Location:index.php");
    exit();
}