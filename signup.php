<?php
include('register.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user inputs from the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Prepare the INSERT statement
        $query = "INSERT INTO user (first_name, last_name, email, username, password) 
                  VALUES (:first_name, :last_name, :email, :username, :password)";
        $stmt = $db->prepare($query);

    
        // Bind the parameters
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
    
        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Register Successful'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Register Unsuccessful');</script>";
        }
    }
    
       
    catch (PDOException $e) {
        // Registration failed
        echo "Signup failed. Please try again.";
    }   
} 
   

?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <form class="main" method="POST" action="">
        <section>
            <div style="margin-bottom: 30px; height: 315px; width: 490px;">
                <p class="head">SIGN UP</p>
                <?php if (!empty($success_message)): ?>
                    <p style="color: green;"><?php echo $success_message; ?></p>
                <?php endif; ?>
                <input type="text" name="first_name" placeholder="First Name" required style="width: 250px;
                 height: 20px; border-radius: 5px;"><br>
                <input type="text" name="last_name" placeholder="Last Name" required style="width: 250px;
                 height: 20px; border-radius: 5px;"><br>
                <input type="email" name="email" placeholder="Email" required style="width: 250px;
                 height: 20px; border-radius: 5px;"><br>
                <input type="text" name="username" placeholder="User name" required style="width: 250px;
                 height: 20px; border-radius: 5px;"><br>
                <input type="password" name="password" placeholder="Password" required style="width: 250px;
                 height: 20px; border-radius: 5px;"><br>
                <input type="Submit" name="sub" value="Sign Up" style="width: 70px;
                 height: 30px;border-radius: 5px;">
            </div>
        </section>
    </form>
</body>
</html>
