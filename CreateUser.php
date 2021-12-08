<?php
  $name = $_POST['newName'];
  echo "Name adding to table: " . $name . "<br>";
  $mysqli = new mysqli("mysql.eecs.ku.edu", "a678b889", "ri4Aipho","a678b889");

  if ($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $query = "SELECT user_id FROM users WHERE user_id = $name";
  if($name == ''){
    echo "You didn't submit a name!";
    exit();
  }else if($mysqli-> query($query)){
    echo "That name already exists.";
    exit();
  }else{
    echo "Adding name to table.<br>";
    $sql = "INSERT INTO users (user_id) VALUES ('$name')";
    if($mysqli->query($sql)){
      echo "Successfully added name to table.<br>";
    }else{
      echo "Failed adding name.<br>";
    }
  }
  $mysqli->close();

?>
