<?php 

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "onlinecourse";

    //connection

    $con = mysqli_connect("$host","$username","$password","$database");

    //check connection

    if(!$con)
    {
         header("location: ../errors/db.php");
        die();
        // die(mysqli_connect_errno($con));
    }
    // else
    // {
    //     echo "Database Connected.!";
    // }

?>