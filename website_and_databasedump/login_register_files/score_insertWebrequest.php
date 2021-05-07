<!-- This file communicates with the Unity Game and is therefore excluded from the Website structure. -->

<?php 
    include "connect.php";

    $userid = $_POST["user"];
    $score = $_POST["score"];
    $username;

    // Check if the user exists.
    $query = "SELECT `id`, `username` FROM users WHERE id=$userid";
    if (!($result = $mysqli->query($query))) showerror($mysqli->errno, $mysqli->error);

    if (mysqli_num_rows($result) > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            $username = $row["username"];
            $query = "INSERT INTO `scores`(`user`, `score`, `date`) VALUES ('$username', $score, CURDATE())";
            if (!($result = $mysqli->query($query))) showerror($mysqli->errno, $mysqli->error);
        }
    }
    else echo "(err)1";
?>
