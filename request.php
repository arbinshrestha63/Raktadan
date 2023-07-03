<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Request Page</title>
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
        width: 70%;
        height: 100%;
        background-color: rgba(68, 2, 2, 0.7);
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
                <h1 align="center" style="color: rgb(68, 2, 2); margin-top: 10px;">Request</h1>
                <br><br>

                <center><div id="form">
                    <form action=""  method="post">
                    <table>
                        <tr>
                            <td width="300px" height="40px">Enter Name</td>
                            <td width="300px" height="40px"><input type="text" name="name" placeholder="Enter Name"
                            style="width: 300px;height: 25px;"></td>
            </tr>

                        <tr>
                            <td width="250px" height="40px">Enter Address</td>
                            <td width="250px" height="40px"><textarea name="address"
                            style="width: 300px;height: 25px;"></textarea></td>
            </tr>
                        <tr>
                            <td width="250px" height="40px">Enter Age</td>
                            <td width="250px" height="40px"><input type="text" name="age" placeholder="Enter age"
                            style="width: 300px;height: 25px;"></td>
            </tr>
            <tr>
                            <td width="250px" height="40px">Choose Blood Group You Want</td>
                            <td width="250px" height="40px">
                                <select name="bgroup">
                                    <option>
                                        <option>A+</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B-</option>
                                        <option>AB+</option>
                                        <option>AB-</option>
                                        <option>O+</option>
                                        <option>O-</option>
            </option>
                                    </select>
                            </td>
                            <tr>
                            <td width="250px" height="40px">Enter Quantity</td>
                            <td width="250px" height="40px"><input type="number" name="quantity" placeholder="Enter quantity"
                            style="width: 300px;height: 25px;" min="0"></td>
            </tr>
                        
                        <tr>
                            <td width="250px" height="40px">Enter E-mail</td>
                            <td width="250px" height="40px"><input type="text" name="email" placeholder="Enter E-mail"
                            style="width: 300px;height: 25px;"></td>
            </tr>
            <tr>
                            <td width="250px" height="40px">Enter Mobile Number</td>
                            <td width="250px" height="40px"><input type="text" name="mno" placeholder="Enter Mobile No."
                            style="width: 300px;height: 25px;"></td>
                        </tr>
                        <tr>
                            <td><input type="Submit" name="sub" value="Save" style="width: 70px;
                         height: 30px; border-radius: 5px;"></td>
            </tr>
            </table>
            </form>

            <?php
if(isset($_POST['sub']))
{
    $name=$_POST['name'];
    $address=$_POST['address'];
    $age=$_POST['age'];
    $bgroup=$_POST['bgroup'];
    $email=$_POST['email'];
    $mno=$_POST['mno'];
    $quantity = $_POST['quantity']; // Assuming you have obtained the user's input for quantity
    
    $q=$db->prepare("INSERT INTO requests (name,address,age,bgroup,email,mno,quantity) VALUES
    (:name, :address, :age, :bgroup, :email, :mno, :quantity)");

    $q->bindValue(':name',$name);
    $q->bindValue(':address',$address);
    $q->bindValue(':age',$age);
    $q->bindValue(':bgroup',$bgroup);
    $q->bindValue(':email',$email);
    $q->bindValue(':mno',$mno);
    $q->bindValue(':quantity',$quantity);
    if($q->execute())
    {
        // Donor registration successful, now update stock_blood table
        $dbStock = new PDO('mysql:host=localhost;dbname=Raktadan', 'root', '');
        $checkQuery = $dbStock->prepare("SELECT quantity FROM stock_blood WHERE bgroup = :bgroup");
        $checkQuery->bindValue(':bgroup', $bgroup);

        if($checkQuery->execute())
        {
            $row = $checkQuery->fetch(PDO::FETCH_ASSOC);
            $availableQuantity = $row['quantity'];
            if($availableQuantity >= $quantity)
            {
                $updateQuery = $dbStock->prepare("UPDATE stock_blood SET quantity = quantity - :quantity WHERE bgroup = :bgroup");
                $updateQuery->bindValue(':quantity', $quantity);
                $updateQuery->bindValue(':bgroup', $bgroup);
        
                if($updateQuery->execute())
                {
                    echo "<script>alert('Request Successful')</script>";
                }
                else
                {
                    echo "<script>alert('Request Successful, but failed to update stock_blood table')</script>";
                }
            }
            else
            {
                echo "<script>alert('Insufficient quantity')</script>";
            }
        }
        else
        {
            echo "<script>alert('Failed to check available quantity')</script>";
        }
    }
    else
    {
        echo "<script>alert('Request Failed')</script>";
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
