<?php
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

// Validate input
if (strlen($login) < 4) {
    echo "Login error";
    exit;
}

if (strlen($username) < 4) {
    echo "Name error";
    exit;
}

if (strlen($email) < 4 || !str_contains($email, '@')) {
    echo "Email error";
    exit;
}

if (strlen($password) < 4) {
    echo "Password error";
    exit;
}

// Password hashing
$salt = '@r02pulkdsahsdoaf#@$%%LL';
$password = md5($salt . $password);

//DB
require "./db.php";

// Insert user data
$sql = 'INSERT INTO users(login, username, email, password) VALUES(?, ?, ?, ?)';
$query = $pdo->prepare($sql); 
$query->execute([$login, $username, $email, $password]);

// Redirect to index.php after successful registration
header('Location: ../auth.php');
exit; // Ensure the script stops here
