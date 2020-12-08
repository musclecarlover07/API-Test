<?php
	include 'Connection.php';

    $postdata = json_decode(file_get_contents("php://input"),TRUE);
    
    $email = $postdata['email'];
    $password = $postdata['password'];
    
    $count = $dbo->prepare("SELECT id, email, password FROM cust WHERE email='$email'");
    $count->bindParam();
    
    

    // the results
    $results = array();
    
    $testtext = "This is a test!";
    
    $openFile = fopen("testfile.txt", "w") or die("Unable to open file!");
    fwrite($openFile, $testtext);
    fwrite($openFile, "\nEmail: $email");
    fwrite($openFile, "\nPassword: $password");
//    fwrite($openFile, "\nPull: $emparray");
    fclose($openFile);

    
    // Close the Database
    $conn->close();
?>
