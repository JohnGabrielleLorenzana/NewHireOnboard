<?php 
session_start();

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
                            echo"<script>window.location.href='adminhomepage.php';</script>";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>ADMIN HOMEPAGE</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #EDF6F9;
    }

    h1 {
        background-color: #006D77;
        color: #83C5BE;
        padding: 30px;
        letter-spacing: 15px;
        text-shadow: 0px 5px 20px #000;
        font-family: fantasy;
        font-size: 50px;
        margin-bottom: 30px;
    }

    h3 {
        font-size: 30px;
        text-align: center;
        letter-spacing: 10px;
        font-family: fantasy;
    }

    @media (max-width: 1440px) {
        .container {
            display: flex;
            place-items:  center;
            justify-content: center;
            max-width: 100%;
        }

    form {
        margin-top: 30px;
    }
    
    input[type="text"], input[type="password"] {
        display: grid;
        gap: 10px;
        width: 100%;
        height: 50px;
        border-radius: 10px;
        border: 1px solid #000;
    }
    }

    #Submit-btn {
        background-color: #83C5BE;
        padding: 6px;
        border-radius: 10px;
    }
    
    #Submit-btn:hover {
        background-color: #006D77;
        color: #fff;
        transition-duration: .7s;
    }

    #logout-btn {
        float: right;
        text-decoration: none;
        background-color: #83C5BE;
        color: #000;
        padding: 6px;
        border-radius: 10px;
        border: 2px solid #000;
    }

    #logout-btn:hover {
        background-color: #006D77;
        color: #fff;
        transition-duration: .7s;
    }
</style>
<body>
<h1 class="display-4; text-center">ADMIN HOMEPAGE</h1>
<div class="container">
    <form id="myForm" action="" method="post">
    <h3>INSERT NEW USER</h3>
        <label for="Email">Email:</label>
        <input name="Email" type="text" placeholder="Email" required><br>
        <label for="Password">Password:</label>
        <input name="Password" type="password" placeholder="Password" required><br>
        <input type="Submit" value="Submit" id="Submit-btn">
        <a href="logout.php" id="logout-btn" >Log out</a>
    </form>
</div>
</body>
</html>