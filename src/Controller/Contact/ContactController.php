<?php


namespace App\Controller\Contact;


use App\Model\ChapterManager;
use App\Service\ContactMail;

class ContactController
{
    public function contact()
    {
        $contact = new ContactMail();
        require 'src/View/contact.php';
    }}