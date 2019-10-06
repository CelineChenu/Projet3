<?php


namespace App\Controller\Contact;


use App\Model\Contact;
use App\Model\ContactManager;
use App\Service\ContactMail;

class ContactController
{
    public function contact()
    {
        $contact = new ContactMail();
        require 'src/View/contact.php';
    }

    public function sendMail()
    {
        {
            if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['message']) && !empty($_POST['message']) && isset($_POST['consent']) && !empty($_POST['consent']))
                {
                        $contact = new Contact();
                        $contact->setName($_POST['name']);
                        $contact->setEmail($_POST['email']);
                        $contact->setMessage($_POST['message']);
                        $contact->setConsent($_POST['consent']);
                        $addContact = new ContactManager();
                        $addContact->mailAdded($contact);
                        $addContact = new ContactMail();
                        $addContact->sendContactMail($contact);

                        header('Location: http://localhost/projet3/contact');
                }
            else
                {
                $_SESSION['contact-error'] = 'Veuillez remplir tous les champs.';
                header('Location: http://localhost/projet3/contact#anchor-contact-error');
                }
        }
    }
}