<?php

	// Get events for home page
   
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
    // If doing a search
    if (($_POST["search-bar"]) != null) {
        $text = $_POST["search-bar"];
        $category = $_POST["search-category"];
        if($category == "show-all") {
            $sql = "SELECT * FROM `events` WHERE`title`like'%{$text}%'OR`date`like'%{$text}%'OR`start`like'%{$text}%'OR`end`like'%{$text}%'OR`location`like'%{$text}%' ORDER BY `date`, `start` ASC";
        }
        else {
            $sql = "SELECT * FROM `events` WHERE `{$category}` like '%{$text}%' ORDER BY `date`, `start` ASC";
        } 
    } else {
        $sql = "SELECT * FROM `events` ORDER BY `date`, `start` ASC";
    }
    

    $events = [];
    $result = $conn->query($sql);
    // Loop through results, get info from each row
    for($i = 0; $i < $result->num_rows; $i++){
        $curr_event = [];
        while($row = $result->fetch_assoc()){
            $curr_event = [$row["id"], $row["title"], $row["date"], $row["start"], $row["end"], $row["location"], $row["description"], $row["owner"]];
            $events[$i] = $curr_event;
            $i++;
      }
    }
    // Close result set 
    $result->close();
    $final_arr["Events"] = $events;
    // Return json data
    echo json_encode($final_arr);
?>