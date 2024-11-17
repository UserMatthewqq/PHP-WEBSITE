<?php
$image = trim(filter_var($_POST['image'], FILTER_SANITIZE_SPECIAL_CHARS));
$followers = trim(filter_var($_POST['followers'], FILTER_SANITIZE_SPECIAL_CHARS));

// Validate input
if (strlen($image) < 4) {
    echo "Image error";
    exit;
}


if (strlen($followers) < 1) {
    echo "Followers error";
    exit;
}

//DB
require "db.php";

//SQL
// Insert user data
$sql = 'INSERT INTO trending(image, followers) VALUES(?, ?)';
$query = $pdo->prepare($sql); 
$query->execute([$image, $followers]);

// Redirect to index.php after successful registration
header('Location: ../trending.php');
exit; // Ensure the script stops here


