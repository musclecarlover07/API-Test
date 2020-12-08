<?php
	include 'Connection.php';

    $postdata = json_decode(file_get_contents("php://input"),TRUE);
    
    $id = $postdata['id'];
    $product = $postdata['product'];
    $qty = $postdata['qty'];
    $unit = $postdata['unit'];

    $isQtyIntDouble = "Not tested";
    $isUnitInt = "Not tested";
    
    // Validate the items
    // Cast them to correct type validate
    if (is_int($qty) or is_double($qty)) {
        $isUnitIntDouble = "Qty is an int or double";
    } else {
        $isUnitIntDouble = "Qty is not an int or double";
    }
    
    if (is_int($unit)) {
        $isUnitInt = "Qty is an int";
    } else {
        $isUnitInt = "Qty is not an int";
    }   
    
    // SQL Statement to right to the database
    $updateDB = "UPDATE inventory SET product='$product', qty='$qty', qtyType='$unit' WHERE id='$id'";

    $idType = getType($id);
    $productType = getType($product);
    $qtyType = getType($qty);
    $unitType = getType($unit);
    
      
    fwrite($openFile, "Id: $id");
    fwrite($openFile, "\nType: $idType");
    
    fwrite($openFile, "\n\nProduct: $product");
    fwrite($openFile, "\nType: $productType");
    
    fwrite($openFile, "\n\nQty: $qty");
    fwrite($openFile, "\nType: $qtyType");
    
    fwrite($openFile, "\n\nUnit: $unit");
    fwrite($openFile, "\nType: $unitType");
    
    fwrite($openFile, "\n\nSQL: $updateDB");
    
    fwrite($openFile, "\n\n$isQtyIntDouble");
    fwrite($openFile, "\n$isUnitInt");
    
    // Execute the code
    if ($conn->query($updateDB) === TRUE) {
        fwrite($openFile, "Record updated successfully");
        echo "Record updated successfully";
    } else {
        fwrite($openFile, "Failed to update with error");
        echo "Failed to update with error: " . $conn->error;
    }
    
    fclose($openFile);
    
    // Close the Database
    $conn->close();
?>
