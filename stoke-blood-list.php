<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Stoke Blood Page</title>
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <style>
        body {
            overflow: hidden;
        }
       
        .logout {
            width: 90px;
            height: 30px;
            background-color:  rgb(68, 2, 2);
            text-align: center;
            padding-top: 10px;
            font-size: 20px;
            border-radius: 10px;
            margin: 526px auto; 
        }
        .logout a {
            text-decoration: none;
            color: white;
            font-weight: bold; 
        }
        ul li{
            width: 30%;
            height: 50px;
            line-height: 50px;
            margin-left: 25px;
            background: white;
            float: left;
            list-style: none;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border-radius: 50px;
        }
        ul li a{
            text-decoration: none;
            color:  rgb(68, 2, 2);
        }

        #form {
        width: 50%;
        height: 100%;
        background-color: rgba(68, 2, 2, 0.6);
        color: white;
        border-radius: 10px;
        font-size: 20px;
        margin: 0px auto;
        
        }

        #header{
        position: absolute;
        width: 80%;
        height: 60px;
        background-color:rgb(68, 2, 2);
        color: white;
        border-radius: 50px;
        font-size: 30px;
        }

        #footer{
        position: fixed;
        bottom: 0;
        width: 80%;
        height: 50px;
        background-color:rgb(68, 2, 2);
        color: white;
        border-radius: 50px;
        font-size: 15px;
    }

    </style>
    </head>
    <body>
    
        <div class="my-element"></div>

        <div class="container">
        <div id="full">
        <div id="inner_full">
        <div id="header">
        <h2 align="center" style="text-align: center; margin: 0 auto; font-size: 50px;">
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
                <br><br><br>
                <h1 align="center" style="color: rgb(68, 2, 2); margin-top: 10px;">Stoke Blood List</h1>
                <br><br>

                <center><div id="form">
                    
                    <table>
                        <tr>
                            <td width="300px"><center><b><font color="white"><u>Name</u></font></b></center></td>
                            <td width="300px"><center><b><font color="white"><u>Quantity(pint)</u></font></b></center></td>
            </tr>
            <tr>
    <td><center><span style="color:black; font-size: 21px;">A+</center></td>
    <td><center>
        <?php
        $bloodType = 'A+'; // Set the blood type

        $q = $db->prepare("SELECT quantity FROM stock_blood WHERE bgroup=:bgroup");
        $q->bindValue(':bgroup', $bloodType);
        $q->execute();

        $row = $q->fetch(PDO::FETCH_ASSOC);
        $quantity = $row['quantity'];

        echo '<span style="color:black; font-size: 21px;">' . $quantity;
        ?>
    </center></td>
</tr>

<tr>
    <td><center><span style="color:white; font-size: 21px;">A-</center></td>
    <td><center>
        <?php
        $bloodType = 'A-'; // Set the blood type

        $q = $db->prepare("SELECT quantity FROM stock_blood WHERE bgroup=:bgroup");
        $q->bindValue(':bgroup', $bloodType);
        $q->execute();

        $row = $q->fetch(PDO::FETCH_ASSOC);
        $quantity = $row['quantity'];

        echo '<span style="color:white; font-size: 21px;">' . $quantity;
        ?>
    </center></td>
</tr>

<tr>
    <td><center><span style="color:black; font-size: 21px;">B+</center></td>
    <td><center>
        <?php
        $bloodType = 'B+'; // Set the blood type

        $q = $db->prepare("SELECT quantity FROM stock_blood WHERE bgroup=:bgroup");
        $q->bindValue(':bgroup', $bloodType);
        $q->execute();

        $row = $q->fetch(PDO::FETCH_ASSOC);
        $quantity = $row['quantity'];

        echo '<span style="color:black; font-size: 21px;">' . $quantity;
        ?>
    </center></td>
</tr>

<tr>
    <td><center><span style="color:white; font-size: 21px;">B-</center></td>
    <td><center>
        <?php
        $bloodType = 'B-'; // Set the blood type

        $q = $db->prepare("SELECT quantity FROM stock_blood WHERE bgroup=:bgroup");
        $q->bindValue(':bgroup', $bloodType);
        $q->execute();

        $row = $q->fetch(PDO::FETCH_ASSOC);
        $quantity = $row['quantity'];

        echo '<span style="color:white; font-size: 21px;">' . $quantity;
        ?>
    </center></td>
</tr>

<tr>
    <td><center><span style="color:black; font-size: 21px;">AB+</center></td>
    <td><center>
        <?php
        $bloodType = 'AB+'; // Set the blood type

        $q = $db->prepare("SELECT quantity FROM stock_blood WHERE bgroup=:bgroup");
        $q->bindValue(':bgroup', $bloodType);
        $q->execute();

        $row = $q->fetch(PDO::FETCH_ASSOC);
        $quantity = $row['quantity'];

        echo '<span style="color:black; font-size: 21px;">' . $quantity;
        ?>
    </center></td>
</tr>

            <tr>
    <td><center><span style="color:white;  font-size: 21px;">AB-</center></td>
    <td><center>
        <?php
        $bloodType = 'AB-'; // Set the blood type

        $q = $db->prepare("SELECT quantity FROM stock_blood WHERE bgroup=:bgroup");
        $q->bindValue(':bgroup', $bloodType);
        $q->execute();

        $row = $q->fetch(PDO::FETCH_ASSOC);
        $quantity = $row['quantity'];

        echo '<span style="color:white; font-size: 21px;">' . $quantity;
        ?>
    </center></td>
</tr>

<tr>
    <td><center><span style="color:black; font-size: 21px;">O+</center></td>
    <td><center>
        <?php
        $bloodType = 'O+'; // Set the blood type

        $q = $db->prepare("SELECT quantity FROM stock_blood WHERE bgroup=:bgroup");
        $q->bindValue(':bgroup', $bloodType);
        $q->execute();

        $row = $q->fetch(PDO::FETCH_ASSOC);
        $quantity = $row['quantity'];

        echo '<span style="color:black; font-size: 21px;">' . $quantity;
        ?>
    </center></td>
</tr>

<tr>
    <td><center><span style="color:white;font-size: 21px;">O-</center></td>
    <td><center>
        <?php
        $bloodType = 'O-'; // Set the blood type

        $q = $db->prepare("SELECT quantity FROM stock_blood WHERE bgroup=:bgroup");
        $q->bindValue(':bgroup', $bloodType);
        $q->execute();

        $row = $q->fetch(PDO::FETCH_ASSOC);
        $quantity = $row['quantity'];

        echo '<span style="color:white; font-size: 21px;">' . $quantity;
        ?>
    </center></td>
</tr>

            </table>
            
            </form>

            <?php
            if(isset($_POST['sub']))
            {
                $name=$_POST['name'];
                $fname=$_POST['fname'];
                $address=$_POST['address'];
                $city=$_POST['city'];
                $age=$_POST['age'];
                $bgroup=$_POST['bgroup'];
                $email=$_POST['email'];
                $mno=$_POST['mno'];
                $q=$db->prepare("INSERT INTO donor_registration (name,fname,address,city,age,bgroup,email,mno) VALUES
                (:name, :fname, :address, :city, :age, :bgroup, :email, :mno)");
                
                $q->bindValue(':name',$name);
                $q->bindValue(':fname',$fname);
                $q->bindValue(':address',$address);
                $q->bindValue(':city',$city);
                $q->bindValue(':age',$age);
                $q->bindValue(':bgroup',$bgroup);
                $q->bindValue(':email',$email);
                $q->bindValue(':mno',$mno);
                if($q->execute())
                {
                    echo"<script>alert('Donor Registration Successful')</script>";
                }
                else
                {
                    echo"<script>alert('Donor Registration Failed')</script>";
                }
            }
            ?>

        
          
            </div>
        </center>
                
</div>
                <div id="footer">
                    <h4 align="center">Copyright &copy; 2023 Raktadan.</h4></div>
                    <p><div class="logout"><a href="logout.php">Logout</a></div>
    </p>  
</div>
    </div>
    </div>
</body>
</html>
