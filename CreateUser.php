<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "j242h828", "iubier7Y", "j242h828");
    if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }
    $username = $_POST["name"];
    if ($username == ""){
        echo "<p align='center'>Field left empty! </p>";
        exit();
    }
    $query = "INSERT INTO Users (User_id) VALUES ('" . $username .  "')";
    if ($result = $mysqli->query($query)){
        echo "<p align='center'> Username was created. </p>";
    }
    else{
        echo "<p align='center'> Username " . $username . " is already taken! </p>";
    }
    $mysqli->close();
?>
