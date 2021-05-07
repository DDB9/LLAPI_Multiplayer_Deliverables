<!-- This file communicates with the Unity Game and is therefore excluded from the Website structure. -->

<?php
	include "connect.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT `password`, `id` FROM users WHERE username='$username'";
    if (!($result = $mysqli->query($query))) showerror($mysqli->errno, $mysqli->error);

    if (mysqli_num_rows($result) > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            if ($row["password"] == $password) echo $row["id"];
            else echo "(err)0";
        }
    }
    else echo "(err)1";
?>
