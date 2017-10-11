<?php
require_once '../HConfig.php';
require_once './mail/PHPMailerAutoload.php';

if (!filter_has_var(INPUT_GET, 'to')) {
    die();
}

$to = filter_input(INPUT_GET, 'to');
$body = filter_input(INPUT_GET, 'body');
$subject = filter_input(INPUT_GET, 'subject');

$mail = new PHPMailer;


$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $email_username;               // SMTP username
$mail->Password = $email_password;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->setFrom($email_username, 'Vaccine Management System');
$mail->addAddress($to, 'Client');     // Add a recipient


//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $body.'<br />';
$mail->AltBody = '_';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '1';
}