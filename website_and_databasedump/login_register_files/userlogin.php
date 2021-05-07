<?php 
	include "connect.php";

    $id;
    $username = $_GET["username"];
    $password = $_GET["password"];

    $query = "SELECT `password`, id FROM users WHERE username='$username'";
    if (!($result = $mysqli->query($query))) showerror($mysqli->errno, $mysqli->error);
        
    if (mysqli_num_rows($result) > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            if ($row["id"]) $id = $row["id"];
            if ($row["password"] == $password)
            {
                echo "User with id " . $id . " has succesfully logged in! <br>";
                echo "Welcome " . $username;

                echo "<h1>TOP 10 HIGHEST SCORES LAST MONTH</h1>";
                echo "<b>Username  -  Score  -  Date</b><br>";

                $query = "SELECT `user`, `score`, `date` FROM `scores` 
                         WHERE date > DATE_SUB((DATE_SUB(curdate(), INTERVAL 1 MONTH)), INTERVAL 4 DAY)
                         ORDER BY score DESC
                         LIMIT 10";

                if (!($info = $mysqli->query($query))) showerror($mysqli->errno, $mysqli->error);
                else 
                {
                    while ($row = $info->fetch_assoc())
                    {
                        if ($row["user"]) echo $row["user"] . "  -  " . $row["score"] . "  -  " . $row["date"] . "<br>";
                    }
                }

                $query = "SELECT `user`, `score`, `date` FROM `scores` 
                            WHERE date > DATE_SUB((DATE_SUB(curdate(), INTERVAL 1 MONTH)), INTERVAL 4 DAY)";
                if (!($data = $mysqli->query($query))) showerror($mysqli->errno, $mysqli->error);
    
                echo "<br><br>";
                echo "Amount of games played last month: " . mysqli_num_rows($data);
            }
            else echo "Entered wrong credentials";
        }
    }
    else echo "Username does not exist (0).";
?>