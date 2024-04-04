<?php

$host = "localhost";
$username = "root";
$passwprd = "admin12345";
$database = "logindb";

$connections = mysqli_connect("localhost", "root", "admin12345", "logindb"); 

    $Email=$Password="";
    $Emailerr=$passworderr="";
    

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["Email"]))
        {
            $Emailerr="Email is Required";
        }
        else
        {
            $Email=$_POST["Email"];
        }
        
        if(empty($_POST["Password"]))
        {
            $passworderr="Password is Required";
        }
        else
        {
            $Password = $_POST["Password"];
        }

        if($Email && $Password)
        {
            include("Connection.php");

            $check_email = mysqli_query($connections, "SELECT * FROM login_tbl WHERE email= '$Email'");
            $check_email_row = mysqli_num_rows($check_email);
                
            if($check_email_row>0)
            {
                while($row=mysqli_fetch_assoc($check_email))
                {
                    $db_password=$row["Password"];
                    $db_account_type=$row["Account_type"];

                    if($db_password == $Password)
                    {
                        if($db_account_type=="1")
                        {
                            echo"<script>window.location.href='adminhomepage.php';</script>";
                        }
                        else
                        {
                            echo"<script>window.location.href='userhomepage.php';</script>";
                        }
                    }
                    else
                    {
                        $passworderr = "Password is incorrect";
                    }
                }
            
            }
            else
            {
                $Emailerr="Email is not registered!";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>New Hire Onboard</title>
</head>
<body>
    <div class="container">
        <h1>New Hire Onboard</h1>
        <form id="myForm" action="" method="post">
            <input name="Email" type="text" placeholder="Email" required><br>
            <input name="Password" type="password" placeholder="Password" required><br>
            <input type="Submit" value="Submit" id="Submit-btn">
        </form>
    </div>
</body>
</html>
