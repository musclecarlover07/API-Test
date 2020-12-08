<?php
    include 'Connection.php';
    include 'JSON.php';
    
    $sensorId = $postData['sensorid'];

    $sql = "SELECT * FROM sensor WHERE sensorid='$sensorId'";
    
    $openFile = fopen("testfile.txt", "w") or die ("Unable to open file!");
    fwrite($openFile, "SQL: $sql");
    fclose($openFile);

    $result = $conn->query($sql);
    
    $tempArray[] = $row;
    
    while($row = mysqli_fetch_assoc($result)) {
        $empArray[] = $row;
    }
    
    echo json_encode($empArray);
    
    $conn->close();
?>
