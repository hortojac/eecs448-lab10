<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "j242h828", "iubier7Y", "j242h828");
    if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }
    $username = $_POST["name"];
    $post = $_POST["post"];
    if ($post == ""){
        echo "<p align='center'> Post Not Created - LEFT EMPTY! </p>";
        exit();
    }
    $query = "SELECT User_id from Users";
    $result = $mysqli->query($query);
    $found = FALSE;
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            if ($row["name"] == $username){
                $found = TRUE;
            }
        }
    }
    if (!$found){
        echo "<p align='center'> Post Not Created - User Not Found! </p>";
        exit();
    }
    $query = "INSERT INTO Posts (content, author_id) VALUES ('" . $post . "', '" . $username .  "')";
    if ($result = $mysqli->query($query)){
        echo "<p align='center'> Post Created! </p>";
    }
    else{
        echo "<p align='center'> Error! </p>";
    }
    $mysqli->close();
?>
