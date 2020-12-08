<?php
    include 'Connection.php';
    include 'JSON.php';
    
    $selectedInventory = $postData['sensorid'];
    
    $sql = "SELECT id, product, qty, qtytype.type FROM inventory inner join qtytype on inventory.qtyType = qtytype.typeid where id= $selectedInventory";
    
//    $passedValue = $_GET['argument1'];
//    $sqlScript = "SELECT id, product, qty, qtytype.type FROM inventory inner join qtytype on inventory.qtyType = qtytype.typeid where id=";
//    $fullSQL = $sqlScript . $passedValue;
    
    $result = $conn->query($sql);
    
    $temparray[] = $row;
    
    while($row =mysqli_fetch_assoc($result)) {
        $emparray[] = $row;
    }
    
    echo json_encode($emparray);
    
    $conn->close();
?>
