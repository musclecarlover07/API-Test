<?php
    include 'Connection.php';
//    include 'JSON.php';
    
    $postdata = json_decode(file_get_contents("php://input"),TRUE);
    
    $dataId = $postdata['dataid'];
    $datetime = $postdata['datetime'];
    $reading = $postdata['reading'];
    $sensorId = $postdata['sensorid'];

    $sql = "SELECT * FROM data WHERE sensorid='$sensorId' order by readingtime ASC";
    $result = $conn->query($sql);
    
    $openFile = fopen("testfile.txt", "w") or die("Unable to open file!");

    fwrite($openFile, "sensorId: $sensorId");
    fwrite($openFile, "\n\ndatetime: $datetime");
    fwrite($openFile, "\n\nId: $dataId");
    fwrite($openFile, "\n\nreading: $reading");
//    fwrite(($openFile, "\n\n");
    fwrite($openFile, $sql);
    

    $emparray = array();

    while($row =mysqli_fetch_assoc($result)) {
        $emparray[] = $row;
    }
    
    echo json_encode($emparray);
    
    fclose($openFile);
    
    // Close the Database
    $conn->close();
?>
