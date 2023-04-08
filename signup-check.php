<?php
session_start();
include "db_conn.php";

if (isset($_POST['USER']) && isset($_POST['PASSKEY'])
    && isset($_POST['Email']) && isset($_POST['RE_PASSKEY'])) {

    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } 
  

    $USER = validate($_POST['USER']);
    $PASSKEY = validate($_POST['PASSKEY']);

    $Email = validate($_POST['Email']);
    $RE_PASSKEY = validate($_POST['Email']);

    $user_data = 'USER=' . $USER.'&Email='. $Email; 

    
    if (empty($USER)) {
        header("Location:signup.php?error=Username is required&$user_data");
        exit();
    }else if(empty($PASSKEY)){
        header("Location:signup.php?error=Password is required&$user_data");
        exit();
    }
    else if(empty($Email)){
    header("Location:signup.php?error=Email is required&$user_data");
    exit();

    }else if(empty($RE_PASSKEY)){
    header("Location:signup.php?error=RE_Password is required&$user_data");
    exit();
    }

    else if($RE_PASSKEY !== $RE_PASSKEY){
        header("Location:signup.php?error=Password Does not Match&$user_data");
        exit();
    }


    else {
        $PASSKEY=md5($PASSKEY);

        $sql = "SELECT * FROM users WHERE USER= '$USER'";
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) >0) {
            header("Location:signup.php?error=Username is already taken&$user_data");
        exit();
        }else{
           $sql2 = "INSERT INTO users(USER,PASSKEY,Email) VALUES
                   ('$USER', '$PASSKEY','$Email')";
           $result2 = mysqli_query($conn,$sql2);
           if ($result2) {
            header("Location:signup.php?success=You're Account has registered successfully");
            exit();
           }else {
            header("Location:signup.php?error=Unknown error occured&$user_data");
        exit();
           }
        }     
    }
    

     }else{
    header("Location:signup.php");
    exit();
}