<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
     $servername = "localhost:3308";
     $username = "root";
     $password = "";
     $dbname = "db_route";
 
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT distinct city FROM tbl_hotels";
    $result = $conn->query($sql);

    $arr = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $lat_lang = $row["city"];
            array_push($arr,$lat_lang);
        }
    }
    echo json_encode($arr);
?>
