<?php

  $mysqli = new mysqli("mysql.eecs.ku.edu", "a678b889", "ri4Aipho", "a678b889");
    /* check connection */
    if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $countQuery = "SELECT COUNT(user_num) AS num FROM users";
  $countResult= $mysqli->query($countQuery);
  $num= $countResult->fetch_assoc();

  for($i= 1; $i<= $num; $i++){
    $user= $_POST['$i'];
    echo= $user;
  }

  $mysqli->close();
?>
