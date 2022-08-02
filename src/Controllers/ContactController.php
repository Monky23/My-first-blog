<?php
namespace Controllers;
use Validation\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//require 'vendor/autoload.php';

class ContactController extends Controller
{
    function contact () 
    {
        return $this->view('contact');
    }

    public function contactPost ()
    {
        $validator = new Validator($_POST);

        $errors = $validator->validate([
            'name' => ['required', 'min:3', 'onlyString'],
            'firstname' => ['required', 'min:3', 'onlyString'],
            'email' => ['required', 'onlyString', 'checkMail'],
            'message' => ['required', 'onlyString'],
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /contact');
            exit;
        }

        $this->_sendMail();

        if ($this->_sendmail()) {
            return $this->view('sendmailconfirm');
        } else {
            return $this->view('contact');
        }

    }


    private function _sendMail() : bool {
     
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            (array) $parameters = $_POST;
            $email_message = $this->_prepareMessage($parameters);
            $this->_getMailConfig($mail);
            $this->_setRecipients($mail , $parameters);
            $this->_setContent($mail , $email_message);
            
            return $mail->send() !== false;

        } catch (Exception $e) {
            return false;
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


    private function _getMailConfig(PHPMailer $mail): void {
        //Server settings
        $mail->SMTPDebug = 0;                               //Enable verbose debug output
        $mail->isSMTP();                                    //Send using SMTP
        $mail->Host       = 'yourSMTPHost';    //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                           //Enable SMTP authentication
        $mail->Username   = 'yourSMTPID';            //SMTP username
        $mail->Password   = 'yourSMTPpassword';             //SMTP password
        $mail->SMTPSecure = "tls";                         //PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                       //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    }


    private function _setRecipients(PHPMailer $mail , array $parameters): void {
        $fullName = $parameters["firstname"] . $parameters["name"];
        $mail->setFrom(
            $parameters["email"], 
            $fullName
        );
        $mail->addAddress(
            "myblog@numeric-experiences.fr", 
            'Webmaster du site'
        );
        $mail->addReplyTo(
            $parameters["email"], 
            $fullName
        );
    }


    private function _setContent(PHPMailer $mail , $email_message) : void {
        $mail->isHTML(false);                                  //Set email format to HTML
        $mail->Subject = "Un visiteur du blog vous envoie un message !";
        $mail->Body    = $email_message;
        $mail->AltBody = $email_message;
    }


    private function _prepareMessage(array $parameters): string {
        
        $email_message = "Détail.\n\n";
        $email_message .= sprintf("Nom: %s \n" , $parameters["name"]);
        $email_message .= sprintf("Prenom: %s \n" , $parameters["firstname"]);
        $email_message .= sprintf("Email: %s \n" , $parameters["email"]);
        $email_message .= sprintf("Message: %s \n" , $parameters["message"]);

        return $email_message;
    }
}
