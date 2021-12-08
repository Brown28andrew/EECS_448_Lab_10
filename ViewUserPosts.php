<?php

  $user= $_POST['selectUser'];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "a678b889", "ri4Aipho", "a678b889");
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }

  echo "Test";

  echo "<Table border= '2px black'>";
  echo "<tr>";
    echo "<td>"
      echo "User";
    echo "</td>";
    echo "<td>"
      echo "Post";
    echo "</td>";
    echo "<td>"
      echo "Post_id";
    echo "</td>";
  echo "</tr>";

  $postsQuery= "SELECT * FROM posts WHERE $author_id = $user ORDER BY post_id";
  $result= $mysqli->query($postsQuery);
  while($row= $result->fetch_assoc()){
    echo "<tr>";
      echo "<td>";
        echo $row['author_id'];
      echo "</td>";
      echo "<td>";
        echo $row['content'];
      echo "</td>";
      echo "<td>";
        echo $row['post_id'];
      echo "</td>";
   echo "</tr>";
  }

  echo "</table>";
  $mysqli->close();
?>
