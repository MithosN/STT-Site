<?php
$name_contact = $_POST['name_contact'];
$phone_contact = $_POST['phone_contact'];
$subject_contact = $_POST['subject_contact'];
$email_contact = $_POST['email_contact'];
$message_contact = $_POST['message_contact'];
$verify_contact = $_POST['verify_contact'];

// the message

// Initialize curl
$curl = curl_init();
    

    // Configure curl options
$data = array('name_contact' => $_POST["name_contact"], 'phone_contact' => $_POST["phone_contact"], 'subject_contact' => $_POST["subject_contact"], 'email_contact' => $_POST["email_contact"], 'message_contact' => $_POST["message_contact"]);
$jsonEncodedData = json_encode($data);
$opts = array(
    CURLOPT_URL             => 'https://hooks.zapier.com/hooks/catch/5575731/opiainn',
    CURLOPT_RETURNTRANSFER  => true,
    CURLOPT_CUSTOMREQUEST   => 'POST',
    CURLOPT_POST            => 1,
    CURLOPT_POSTFIELDS      => $jsonEncodedData,
    CURLOPT_HTTPHEADER  => array('Content-Type: application/json','Content-Length: ' . strlen($jsonEncodedData))                                                                       
);
    // Set curl options
    curl_setopt_array($curl, $opts);

    // Get the results
    $result = curl_exec($curl);

    // Close resource
    curl_close($curl);

    echo $result;

header('Location: https://savetotravel.com/contact2.html');
?>