<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body {
            background-color: black;
        }
        .logout {
            width: 90px;
            height: 40px;
            background-color: white;
            text-align: center;
            padding-top: 10px;
            font-size: 20px;
            border-radius: 10px;
            margin: 500px; 
        }
        .logout a {
            text-decoration: none;
            color: rgb(68,2,2);
            font-weight: bold; 
        }
        ul{
            text-align:center;
           
        }
        ul li{
            width: 30%;
            height: 50px;
            line-height: 50px;
            margin-left: 20px;
            background: white;
            list-style: none;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 15px;
        }

        ul li a{
            text-decoration: none;
            color:  rgb(68, 2, 2);
        }

        .welcome-heading{
            animation: fadeIn 1s ease-in-out;
            opacity: 1;
        }

        @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(-20px); /* Move up by 20px */
        }
        100% {
            opacity: 1;
            transform: translateY(0); /* Move back to the original position */
        }
        }

        .fade-in-animation {
            opacity: 1;
            animation: fade-in 1s ease-in-out forwards;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
            
        


    </style>
    </head>
    <body>
    <div class="background-image">
        <div class="my-element"></div>

        <div class="container">
        <div id="full">
        <div id="inner_full">
        <div id="header">
        <h2 align="center" style="text-align: center; margin: 0 auto; font-size: 70px;">
        <a href="admin-home.php" style="text-decoration: none; color: white;">
            Raktadan
        </a>
    </h2>
</div>

            <div id="body">
                <br>
                
                <?php
                $un=$_SESSION['username'];
                if(!$un)
                {
                    header("Location:index.php");
                }
                ?>
                <br><br>
                <h1 class="welcome-heading" align="center" style="color: white; margin-top: 50px; font-size: 50px;">Welcome</h1>

                <br><br><br>
            
               
                <ul style="margin-left: -60px;">
                    <li class="fade-in-animation"><a href="donor-red.php">Donor Registration</a></li>
                    <li class="fade-in-animation"><a href="donor-list.php">Donor List</a></li>
                    <li class="fade-in-animation"><a href="request.php">Request</a></li>
                    <li class="fade-in-animation"><a href="stoke-blood-list.php">Stoke Blood List</a></li>
                    
            </ul>
            
            

               
</div>
                <div id="footer">
                    <h4 align="center">Copyright &copy; 2023 Raktadan.</h4></div>
                    <p><div class="logout"><a href="logout.php">Logout</a></div>
    </p>
    <style>   
</div>
</div>
    </div>
    </div>
</body>
</html>
