<?php
    include 'Connection.php';
    
    $passedValue = $_GET['argument1'];
    $sqlScript = "select * from sensor where sensorid=";
    $fullSQL = $sqlScript . $passedValue;
    
    $result = $conn->query($fullSQL);
    
    $temparray[] = $row;
    
    while($row =mysqli_fetch_assoc($result)) {
        $emparray[] = $row;
    }
    
    echo json_encode($emparray);
    
    $conn->close();
?>
