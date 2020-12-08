<?php
	include 'Connection.php'; 

	$sql = "SELECT inventory.id, inventory.product, inventory.qty, qtytype.type FROM `inventory` INNER JOIN qtytype ON qtytype.typeid = inventory.qtyType";
	$result = $conn->query($sql);
    
	$emparray = array();
    
    while($row =mysqli_fetch_assoc($result)) {
        $emparray[] = $row;
    }
    
    echo json_encode($emparray);
    
    // Close the Database
    $conn->close();
?>
