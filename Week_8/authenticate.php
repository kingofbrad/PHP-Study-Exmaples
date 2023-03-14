<?php
session_start();
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "root";
$dbName = "Users";


$con = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
if (mysqli_connect_errno()) {
    exit('Failed to connect ot MySQL:'  . mysqli_connect_error());
}


if (!isset($_POST["username"], $_POST["password"])) {
    exit("Please fill both the username and password fields!");
}


if ($stmt = $con->prepare('SELECT id, password FROM User WHERE username = ?')) {
    $stmt->bind_param('s', $_POST["username"]);
    $stmt->execute();
    $stmt->close();
}

$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password);
    $stmt->fetch();


    if (password_verify($_POST["password"], $password)) {
        session_regenerate_id();
        $_SESSION["loggedin"] = TRUE;
        $_SESSION['name'] = $_POST["username"];
        $_SESSION["id"] = $id;
        echo 'Welcome' . $_SESSION["name"] . '!';
    } else {
        echo "Incorrect Username and/or password";
    }
} else {
    echo "Incorrect username and/or password!";
}
