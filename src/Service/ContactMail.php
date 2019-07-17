<?php


namespace App\Service;

use App\Model\Contact;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class ContactMail
{
    public function sendContactMail(Contact $contact) {
// Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = MailLog::EMAIL;                     // SMTP username
            $mail->Password   = MailLog::PASSWORD;                               // SMTP password
            $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom(MailLog::EMAIL, 'Mailer');
            $mail->addAddress(MailLog::EMAIL, 'Jean Forteroche');     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Mail contact blog';
            $mail->Body    = '<p>Mail de '. $contact->getName() .'</p>'.' <p>provenant du mail ' .$contact->getEmail() .'</p>'.' <p> Message : <br><br>'. $contact->getMessage().'</p>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}