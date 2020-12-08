<?php
	include 'Connection.php';
	
    $passedValue = $_GET['argument1'];
	$sqlScript = "Select * From data WHERE sensorid=";
    $fullSQL = $sqlScript . $passedValue;
    
    //$result = $conn->query($fullSQL)
    $result = $conn->query($fullSQL);
    
	$emparray = array();
    
    while($row =mysqli_fetch_assoc($result)) {
        $emparray[] = $row;
    }
    
    echo json_encode($emparray);
    
    // Close the Database
    $conn->close();
?>
