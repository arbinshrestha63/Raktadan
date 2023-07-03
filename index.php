<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
    
    <style>
        input[type="text"], input[type="password"], {
            font-size: 15px; 
        }
    </style>
    <style>
        body {
            background-color: black;
        }
        .signup-box {
        height: 80px; 
        padding:  10px; 
        display: inline-block;
        
    }

    .signup-box p {
        color: white;
        font-size: 25px;
        font-weight: bold;
        margin: 0; 
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
            <h2 align="center"style="text-align: center; margin: 0 auto; font-size: 70px;">Raktadan</h2></div>
        <div id="body">
            <br><br><br><br><br>
            <form action="" method="post">
            <table align="center">
            <tr>
                <td width="200px" height="70px" style="color:white; font-size: 20px;"><b>Enter Username</b></td>
                <td width="200px" height="70px"><input type="text" name="username" placeholder="Enter Username" required
                style="width: 300px;height: 35px;border-radius: 10px;"></td>
            </tr>
            <tr>
                <td width="200px" height="70px" style="color:white; font-size: 20px"><b>Enter Password</b></td>
                <td width="200px" height="70px"><input type="password" name="password" placeholder="Enter Password" required
                style="width: 300px;height: 35px;border-radius: 10px;"></td>
            </tr>
            <tr>
                <td><input type="Submit" name="sub" value="Login" style="width: 70px;
                 height: 30px;border-radius: 5px;"></td>

    </tr>
    
    <tr>
    <td colspan="2" align="center"> 
    <div class="signup-box">
    <p style="color: white; font-size: 25px; font-weight:bold; padding-top: -25px;">
        Not a member? </p>
        <br>
        <button id="Button2" type="button" onclick="window.location.href = 'signup.php';" style="width: 70px;
                 height: 30px;border-radius: 5px;">Sign Up</button>
                 </div>
    </td>
</tr>

             </table>
        </form>

        <?php
        if(isset($_POST['sub']))
        {
            $un=$_POST['username'];
            $ps=$_POST['password'];
            $q=$db->prepare("SELECT * FROM user where username='$un' && password='$ps'");
            $q->execute();
            $res=$q->fetchAll(PDO::FETCH_OBJ);
            if($res)
            {
                $_SESSION['username']=$un;
                header("Location:admin-home.php");
            }
        else
        {
            echo "<script>alert('Wrong User')</script>";
        }
    }
 ?>
                
        
        <div id="footer"><h4 align="center">Copyright &copy; 2023 Raktadan.</h4></div>
</div></div>
</body>
</html>
