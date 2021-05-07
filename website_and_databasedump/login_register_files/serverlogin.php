<?php 
    include "connect.php";

    $id = $_GET["id"];
    $password = $_GET["password"];

    $query = "SELECT `id`, `password` FROM `servers` WHERE id=$id AND password='$password' LIMIT 1";
    if (!($result = $mysqli->query($query))) showerror($mysqli->errno, $mysqli->error);
        
    if (mysqli_num_rows($result) != 0)
    {
        session_start();
        echo "LOGIN SUCCESFUL. Session stared with id: " . session_id() . "<br><br>";

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
    else echo 0;


?>

<!DOCTYPE HTML>
<html>
    <br>
    <br>
    <br>
    <h2>SERVER SCORE INSERT PANEL</h2>
        <form action="server_score_insert.php?" 
              method="GET">
            Username: <input type="text" id="username" name="username"><br>
            Score:    <input type="text" id="score" name="score"><br><br>
            <input type="submit" value="Submit">
        </form>
</html>
