<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "a678b889", "ri4Aipho", "a678b889");
  if($mysqli-> connect_errno){
    printf("connect failed: %s\n", $mysqli-> connect_errno);
    exit();
  }
  $num = 1;
  $userCountQuery = "SELECT COUNT(user_num) AS num FROM users";
  $countResult = $mysqli->query($userCountQuery);
  $count = $countResult->fetch_assoc();
  echo "Number of users: " . $count['num'] . "<br>";
  $query = "SELECT user_id FROM users WHERE user_num = $num";
  $result = $mysqli->query($query);
  $row = $result->fetch_assoc();

  echo "List of users:<br>";
  echo "<table border = '2px black'>";
  while($num <= $count['num']){
    echo "<tr>";
      echo "<td>";
        echo $row["user_id"];
      echo "</td>";
    echo "</tr>";
    $num++;
    $query = "SELECT user_id FROM users WHERE user_num = $num";
    $result = $mysqli->query($query);
    $row = $result-> fetch_assoc();
  }
  echo "</table>";
  $mysqli->close();
?>
