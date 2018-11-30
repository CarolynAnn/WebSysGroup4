<?php

    session_start();
    require 'resources\functions\config.php';

    $servername = $db_config["host"];
    $username = $db_config["user"];
    $password = $db_config["pass"];
    $dbname = $db_config["name"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    } 

    // Get user email (owner)
    $userID = $_SESSION['userID'];
    $query = $conn->query("SELECT * FROM `users` WHERE `userID` = $userID");
    $email = "";
    while($user = $query->fetch_assoc()){
        $email = $user['email'];
    }

    // Get all events where current user is owner
    $sql = "SELECT * FROM events e WHERE e.owner = '$email' ORDER BY `date`, `start` ASC";

    $events = [];
    $result = $conn->query($sql);
    //Loop through results, get info from each row
    for($i = 0; $i < $result->num_rows; $i++){
        $curr_event = [];
        while($row = $result->fetch_assoc()){
            $curr_event = [$row["id"], $row["title"], $row["date"], $row["start"], $row["end"], $row["location"], $row["description"], $row["owner"]];
            $events[$i] = $curr_event;
            $i++;
      }
    }
    /* close result set */
    $query->close();
    $result->close();
    $final_arr["Events"] = $events;
    //Return json data
    echo json_encode($final_arr);
?>