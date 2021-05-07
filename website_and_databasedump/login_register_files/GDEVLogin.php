<?php 
  include "getphp.inc";
  include "connect.php"; 
?>


<!DOCTYPE HTML>
<html>

  <head>
    <title>Database Login - Portfolio Daan de Bruijn</title>
    <link rel="stylesheet" href="stylesheet<?php echo $sheet; ?>.css">
    <link rel="icon" href="Afbeeldingen/Naamloos.ico">
 </head>

    <nav>
      <ul>
        <?php include "navigatie.inc"; ?>
      </ul>
    </nav>


  <body>
    <h1>GDEV2 PHP LOGIN PAGE</h1>
      
    <div id="SQL_Instert_Form" style="width: width/2px">
        <h3>Server Login</h3>
        <form action="serverlogin.php?" 
              method="GET">
            Server-ID: <input type="text" id="id" name="id"><br>
            Password: <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Login">
        </form>

        <br>
        <br>

        <h3>User Login</h3>
        <form action="userlogin.php?" 
              method="GET">
            Username: <input type="text" id="username" name="username"><br>
            Password: <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Login">
        </form>
        
        <br>
        <br>

        <h3>Register User</h3>
        <form action="register.php?" 
              method="GET">
            Username: <input type="text" id="username" name="username"><br>
            Password: <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>

  </body>

              
    <footer>
        <a class="knoppie" href="?style=<?php
                                        if($sheet == 1)
                                        {
                                            echo "2";
                                        }
                                        else
                                        {
                                            echo "1";
                                        }
                                        ?>">CSS Switcharoo</a>
    </footer>
</html>
