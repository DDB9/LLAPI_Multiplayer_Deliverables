<?php
   $db_user = '';
   $db_pass = '';
   $db_host = '';
   $db_name = '';

   $ins_game_id = "";
   $ins_user_id = "";
   $ins_username = "";
   $ins_score = "";

   // Open a connection.
   $mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");

   // Check connection.
   if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno() . ") " . $mysqli->connect_error();
      exit();
   }

   // Error function.
   function showerror($error, $errornr) {
        die("Error (" . $errornr . ") " . $error);
   }
?>