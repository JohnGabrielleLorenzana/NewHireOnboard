<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>USER HOMEPAGE</title>
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
        padding: 15px;
        letter-spacing: 15px;
        text-shadow: 0px 5px 20px #000;
        font-family: fantasy;
        font-size: 50px;
        margin-bottom: 30px;
    }

    #logout-btn {
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
    <h1 class="display-4; text-center">USER HOMEPAGE</h1>
    <a href="logout.php" class="btn btn-primary" id="logout-btn" >Log Out</a>
    
</body>
</html>