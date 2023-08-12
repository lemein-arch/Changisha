<?php
header("Content-Type: application/json");

$stkCallbackResponse = file_get_contents('php://input');
$logFile = "tinyMpesa.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);

$callbackContent = json_decode($stkCallbackResponse);


$name = $callbackContent->Body->stkCallback->name;
$email = $callbackContent->Body->stkCallback->email;
$CheckoutRequestID = $callbackContent->Body->stkCallback->CheckoutRequestID;
$ResultCode = $callbackContent->Body->stkCallback->ResultCode;
$Amount = $callbackContent->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$MpesaReceiptNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$phoneNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[4]->Value;

if ($ResultCode == 0) {

    // Database connection details 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "crowdfunding";

    // Create a new connection
    $con = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($con->connect_error) {
        die("<h1>Connection failed:</h1> " . $con->connect_error);
    } else {
        $sql = "INSERT INTO doantions (Donater_name,Donater_email,MSISDN,CheckOutRequestID,ResultCode,Amount,MpesaReceiptNumber)
                VALUES ('$name','$email','$phonenumber','$CheckoutRequestID', '$ResultCode', '$Amount', '$MpesaReceiptNumber')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created";
        } else {
            echo "Error: " . $conn->error;
        }

        $conn->close();
    }
}
