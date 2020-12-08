<?php
	include 'Connection.php'; 

	$sql = "Select * FROM data WHERE sensorid=2";
	$result = $conn->query($sql);
    
	$emparray = array();
    
    while($row =mysqli_fetch_assoc($result)) {
        $emparray[] = $row;
    }
    
    echo json_encode($emparray);
    
    // Close the Database
    $conn->close();
?>
