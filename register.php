<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=Raktadan', 'root', '');

    // Set PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Perform operations on the "user" table
    // Example: fetching all rows from the "user" table
    $query = "SELECT * FROM user";
    $stmt = $db->query($query);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the user data
   
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
