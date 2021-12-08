<?php
  $user= $_POST['username'];
  $userPost= $_POST['userpost'];
  echo "Username making the post: " . $user . "<br>";
  echo "Post being added: " . $userPost . "<br>";
  if($userPost == ''){
    echo "You didn't write anything to post.<br>";
    exit();
  }

  $mysqli = new mysqli("mysql.eecs.ku.edu", "a678b889", "ri4Aipho", "a678b889");
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $userQuery= "SELECT user_id FROM users WHERE user_id = '$user'";
  if($mysqli->query($userQuery)){
    echo "Found user. Adding post to table.<br>";
    $postQuery= "INSERT INTO Posts (content, author_id) VALUES ('$userPost', '$user')";
    if($mysqli->query($postQuery)){
      echo "Post added to table.<br>";
    }else{
      echo "Post failed to add.<br>";
    }
  }else{
    echo "User not in database.<br>";
  }
  $mysqli->close();
?>
