<?php
// Ingresa tu clave secreta.....
define("RECAPTCHA_V3_SECRET_KEY", '6LfSfV8aAAAAAGxZCrLk8uSA-NuPwVTlGQQra5UZ');

$token = $_POST['token'];
$action = $_POST['action'];
 
// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);
 
// verificar la respuesta
if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
    // Si entra aqui, es un humano, puedes procesar el formulario


    $name_contact = $_POST['name_contact'];
    $phone_contact = $_POST['phone_contact'];
    $last_name = $_POST['last_name'];
    $email_contact = $_POST['email_contact'];
    $message_contact = $_POST['message_contact'];

        // the message

        // Initialize curl
        $curl = curl_init();
            

            // Configure curl options
        $data = array('name_contact' => $_POST["name_contact"], 'phone_contact' => $_POST["phone_contact"], 'last_name' => $_POST["last_name"], 'email_contact' => $_POST["email_contact"], 'message_contact' => $_POST["message_contact"]);
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




} else {
    // Si entra aqui, es un robot....
    header('Location: https://savetotravel.com/contact3.html');
}



?>