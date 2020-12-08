<?php
	include 'Connection.php';	
	
	$sql = "SELECT * FROM sensor";
    $result = $conn->query($sql);
    
    $emparray = array();
    
    while($row =mysqli_fetch_assoc($result)) {
        $emparray[] = $row;
    }
    
    echo json_encode($emparray);
    
    // Close the Database
    $conn->close();
?>