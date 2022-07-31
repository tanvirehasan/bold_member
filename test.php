<?php 




$mail = new PHPMailer();

// Settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "mail.gmail.com";    // SMTP server example
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
$mail->Username   = "tanvirhasanbcse@gmail.com";            // SMTP account username example
$mail->Password   = "T^N<!r@@517";            // SMTP account password example

// Content
$mail->isHTML(true);                       // Set email format to HTML
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
    
    
    
    
    
    
    

?>


