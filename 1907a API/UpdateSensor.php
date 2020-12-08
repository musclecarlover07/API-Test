<?php
	include 'Connection.php';

    $postdata = json_decode(file_get_contents("php://input"),TRUE);
    
    $id = $postdata['sensorid'];
    $type = $postdata['type'];
    $location = $postdata['location'];
    $hi = $postdata['hi'];
    $lo = $postdata['lo'];

    $isHiIntDouble = "Not tested";
    $isLoIntDouble = "Not tested";
    $isLocation = "Not tested";
    
    // Validate the items
    // Cast them to correct type validate
    if (is_int($hi) or is_double($hi)) {
        $isHiIntDouble = "Hi is an int or double";
    } else {
        $isHiIntDouble = "Hi is not an int or double";
    }
    
    if (is_int($lo) or is_double($lo)) {
        $isLoIntDouble = "Lo is an int or double";
    } else {
        $isLoIntDouble = "Lo is not an int or double";
    }
    
    if (is_string($location)) {
        $isLocation = "Location is a string";
    } else {
        $isLocation = "Location is not a string";
    }
    
    // SQL Statement to right to the database
    $updateDB = "UPDATE sensor SET type='$type', location='$location', hi='$hi', lo='$lo' WHERE sensorid='$id'";

    $idType = getType($id);
    $locationType = getType($location);
    $typeType = getType($type);
    $hiType = getType($hi);
    $loType = getType($lo);
    
    $openFile = fopen("testfile.txt", "w") or die("Unable to open file!");
    fwrite($openFile, "Id: $id");
    fwrite($openFile, "\nType: $idType");
    fwrite($openFile, "\n\nId: $type");
    fwrite($openFile, "\nType: $typeType");
    fwrite($openFile, "\n\nLocation: $location");
    fwrite($openFile, "\nType: $locationType");
    fwrite($openFile, "\n\nHi: $hi");
    fwrite($openFile, "\nType: $hiType");
    fwrite($openFile, "\n\nLo: $lo");
    fwrite($openFile, "\nType: $loType");
    fwrite($openFile, "\n\nSQL: $updateDB");
    fwrite($openFile, "\n\n$isHiIntDouble");
    fwrite($openFile, "\n$isLoIntDouble");
    fwrite($openFile, "\n$isLocation");
    
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
