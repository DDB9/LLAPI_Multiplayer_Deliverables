<!-- This file communicates with the Unity Game and is therefore excluded from the Website structure. -->

<?php
    include "connect.php";

    $id = $_POST["id"];
    $password = $_POST["password"];

    $query = "SELECT `password` FROM servers WHERE id=$id";
    if (!($result = $mysqli->query($query))) showerror($mysqli->errno, $mysqli->error);

    if (mysqli_num_rows($result) > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            if ($row["password"] == $password) 
            {
                echo $id;
            }
            else echo "(err)0";
        }
    }
    else echo "(err)1";
?>
