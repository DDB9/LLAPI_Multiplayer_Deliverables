<?php
    include "connect.php";

    $username = $_GET["username"];
    $score = $_GET["score"];

    $query = "INSERT INTO `scores`(`user`, `score`, `date`) VALUES ('$username', $score, CURDATE())";
    if (!($result = $mysqli->query($query))) showerror($mysqli->errno, $mysqli->error);
    else echo "Query succesful! Check the database (1)."
        
?>