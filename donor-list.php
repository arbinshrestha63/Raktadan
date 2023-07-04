<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Donor List Page</title>
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <style>
        td{
            width: 10000px;
            height: 50px;
        }
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

        #form {
        width: 95%;
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
                <h1 align="center" style="color: rgb(68, 2, 2); margin-top: 10px;">Donor List</h1>
                <br><br>

                <center><div id="form">
                    <table>
                    <tr>
                        <td><center><b><u>Name</u></b></center></td>
                        <td><center><b><u>Father's Name</u></b></center></td>
                        <td><center><b><u>Address</u></b></center></td>
                        <td><center><b><u>Quantity</u></b></center></td>
                        <td><center><b><u>Age</u></b></center></td>
                        <td><center><b><u>Select Blood Group</u></b></center></td>
                        <td><center><b><u>E-mail</u></b></center></td>
                        <td><center><b><u>Mobile Number</u></b></center></td>
                    </tr>
                    <?php
                    $q=$db->query("SELECT * FROM donor_registration");
                    while($r1=$q->fetch(PDO::FETCH_OBJ))
                    {
                        ?>
                        <tr>
                        <td><center><font color="black"><?=$r1->name; ?></font></center></td>
                        <td><center><font color="black"><?=$r1->fname; ?></font></center></td>
                        <td><center><font color="black"><?=$r1->address; ?></font></center></td>
                        <td><center><font color="black"><?=$r1->quantity; ?></font></center></td>
                        <td><center><font color="black"><?=$r1->age; ?></font></center></td>
                        <td><center><font color="black"><?=$r1->bgroup; ?></font></center></td>
                        <td><center><font color="black"><?=$r1->email; ?></font></center></td>
                        <td><center><font color="black"><?=$r1->mno; ?></font></center></td>
                      

                     </tr>
                        <?php
                    }
                    ?>
                    </table>
            

        
          
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
