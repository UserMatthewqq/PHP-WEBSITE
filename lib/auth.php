<?php
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));


// Validate input
if (strlen($login) < 4) {
    echo "Login error";
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

//Auth user
$sql = 'SELECT id FROM users WHERE login = ?  AND password = ?';
$query = $pdo-> prepare($sql);
$query->execute([$login, $password]);

if($query-> rowCount() == 0)
    echo "Такого пользователя нет!";
else{
    setcookie('login', $login, time() + 3600 * 24 * 30, "/" );
    header('Location: ../users.php');

}

