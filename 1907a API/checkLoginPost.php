<?php
    include 'Connection.php';
    include 'JSON.php';
    
    $openFile = fopen("testfile.txt", "w") or die("Unable to open file!");
    
    $uname = $postData['email'];
    $upass = $postData['password'];
    $thehash = md5($upass);
    
    $emailCheck = "select email from cust";
    $emailResult = $conn->query($emailCheck);
    
    $sql = "select email, password from `cust` where email = '$uname'";
    $result = $conn->query($sql);
    
    $emailArray = array();
    $wrongCredentials[] = ["sessiontoken" => "Incorrect Username or Password"];
    
    while($row = mysqli_fetch_assoc($emailResult)) {
        $emailArray[] = $row;
    }
    
    $emailVal = "Test";
    
    foreach ($emailArray as $key => $data) {
        if ($data['email'] == $uname) {
            $emailVal = "Good Email";
            break; // no need to loop anymore, as we have found the item => exit the loop
        } else {
            $emailVal = "Bad Email";
            
        }
    }
    
    if ($emailVal == "Good Email") {
//        echo $emailVal;
        
        while($row = mysqli_fetch_assoc($result)) {
            if ($row['password'] == $thehash) {
                $custPull = "SELECT sessiontoken FROM cust WHERE email = '$uname'";
                $custResult = $conn->query($custPull);
                
                while($custRow = mysqli_fetch_assoc($custResult)) {
                    $empArray[] = $custRow;
                    $token = openssl_random_pseudo_bytes(16);
                    $token = bin2hex($token);
                    
                    $custId = $empArray[id];
                    
                    $updateToken = "UPDATE cust SET sessiontoken='$token' WHERE id='$custId'";
                    
                    if ($conn->query($updateToken) == TRUE) {
                        $result = $conn->query($custPull);
                        
                        while($row = mysqli_fetch_assoc($result)) {
                            $empArray[] = $row;
                        }
                    }
                    
                    echo json_encode($empArray);
                }
            } else {
                echo json_encode($wrongCredentials);
            }
        }
    } else {
//        echo $emailVal;
        echo json_encode($wrongCredentials);
    }
    
    
    
    fclose($openFile);
    
    // Close the Database
    $conn->close();
?>
