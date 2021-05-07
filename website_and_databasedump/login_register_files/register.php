<?php
	include "connect.php";

    $username = $_GET["username"];
    $password = $_GET["password"];

    $query = "SELECT `username` FROM users WHERE username='$username'";
    if (!($result = $mysqli->query($query))) showerror($mysqli->errno, $mysqli->error);

    if (mysqli_num_rows($result) == 0)
    {
        if (empty($username) ||  empty($password)) echo "Username or Password was empty! Please try again.";
        else
        {
            $query = "INSERT INTO `users`(`username`, `password`) VALUES ('$username', '$password')";
            if (!($result = $mysqli->query($query))) showerror($mysqli->errno, $mysqli->error);
            else echo "Account succesfully created! You can now log in.";
        }
    }
    else echo "(err)2";
?>