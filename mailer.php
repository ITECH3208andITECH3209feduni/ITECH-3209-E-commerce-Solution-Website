<?php 

require("dotenv.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require('autoload.php');

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();


if(isset($_POST['contact_form'])){
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
        $mail->isSMTP(); // Send using SMTP
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $username = $_ENV['GMAIL_EMAIL'];
        $password = $_ENV['GMAIL_PASSWORD'];
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true; 
        $mail->Username = $username; 
        $mail->Password = $password; 
        $mail->Port = 587; 
        $mail->setFrom($username, $_POST['name']);
        $mail->addAddress($username); 
     $mail->isHTML(true); 
        $mail->Subject = 'Contact Form';
        $mail->Body ="<h4>Message from ".$_POST['name']."</h4><br>".$_POST['message'];
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if($mail->send()){
            echo "message send";

        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
if(isset($_POST['mailAdmin'])){
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP(); 
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $username = $_ENV['GMAIL_EMAIL'];
        $password = $_ENV['GMAIL_PASSWORD'];
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = $username; // SMTP username 
        $mail->Password = $password; // SMTP password
        $mail->Port = 587; 
        $mail->setFrom($username, 'Administrator');
        $mail->addAddress($_POST['recipient-email']); // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Important info';
        $mail->Body = $_POST['message-text'];
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if($mail->send()){
            echo "message send";

        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}