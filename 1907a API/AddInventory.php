<?php
	include 'Connection.php';
    include 'JSON.php';
    
    $updateProduct = $postData['product'];
    $updateQty = $postData['qty'];
    $updateQtyType= $postData['qtyType'];
	
	$sql = "INSERT INTO inventory (product, qty, qtyType) VALUES ('$updateProduct', '$updateQty', '$updateQtyType')";
    
    $openFile = fopen("testfile.txt", "w") or die("Unable to open file!");
    fwrite($openFile, "Update Product: $updateProduct");
    fwrite($openFile, "\nUpdate Qty: $updateQty");
    fwrite($openFile, "\nUpdate Qtytype: $updateQtyType");
    fwrite($openFile, "\n\nSQL: $sql");
    
    fclose($openFile);
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Record not updated";
    }
    
    // Close the Database
    $conn->close();
?>
