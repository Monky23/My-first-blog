<?php
namespace Controllers;
use Validation\Validator;
ini_set("SMTP","tls://smtp.gmail.com");
ini_set("smtp_port","587");

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

        $email_to = "tootooyootoo23@gmail.com";
        $email_subject = "Un visiteur du blog vous envoie un message !";

        $array = $_POST;
        $name = $array["name"];
        $firstname = $array["firstname"];
        $email = $array["email"];
        $message = $array["message"];

        $email_message = "Détail.\n\n";
        $email_message .= "Nom: ".$name."\n";
        $email_message .= "Prenom: ".$firstname."\n";
        $email_message .= "Email: ".$email."\n";
        $email_message .= "Message: ".$message."\n";
     
        $headers = 'From: '.$email."\r\n".
        'Reply-To: '.$email."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        mail($email_to, $email_subject, $email_message, $headers);
    }
}

