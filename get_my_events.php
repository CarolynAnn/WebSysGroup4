<?php
   
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "rpi_events";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    } 
    $sql = "SELECT * FROM `events` WHERE `owner` = '2' ORDER BY `date`, `start` ASC";

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