<?php

    // Get events for "Saved" page

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

    // Get all events that current user has saved/is attending
    $sql = "SELECT e.id, e.title, e.date, e.start, e.end, e.location, e.description, e.owner FROM attendants a , events e WHERE a.eid = e.id AND a.uid =" . $_SESSION['userID'] . " ORDER BY `date`, `start` ASC";
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
    $result->close();
    $final_arr["Events"] = $events;
    //Return json data
    echo json_encode($final_arr);
?>