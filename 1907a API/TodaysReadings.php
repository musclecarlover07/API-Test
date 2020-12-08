<?php
	include 'Connection.php';
    include 'JSON.php';
    
    $id = $postData['sensorid'];
    $todaydate = $postData['tDate'];
    
    // SQL Statement to right to the database
    $sql = "SELECT * FROM `data` where sensorid = '$id' and readingtime BETWEEN '$todaydate' and '$todaydate 23:59:59' order by readingtime ASC";

    $openFile = fopen("testfile.txt", "w") or die("Unable to open file!");
    fwrite($openFile, "Id: $id");
    fwrite($openFile, "\nTodays Date: $todaydate");
    fwrite($openFile, "\nSQL: $sql");
    
    $result = $conn->query($sql);
    $empArray = array();

    while($row = mysqli_fetch_assoc($result)) {
        $empArray[] = $row;
    }
    
    fclose($openFile);
    
    echo json_encode($empArray);
    
    // Close the Database
    $conn->close();
?>
