<?php


namespace App\Controller\Home;


use App\Model\ChapterManager;

class HomeController
{
    public function home()
    {
        $chapter = new ChapterManager();
        $lastChapter = $chapter->getLastChapter();
        $firstChapter = $chapter->getFirstChapter();
        $allChapters = $chapter->getAllChapters();
        $lastThreeChapters = $chapter->getLastThreeChapters();
        require 'src/View/index/home.php';
    }

    public function test()
    {
        $password = 'test';
        echo password_hash($password, PASSWORD_DEFAULT);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        if (password_verify('Test', $hash))
            {
                echo 'Le mot de passe est valide !';
            }
        else
            {
                echo 'Le mot de passe est invalide.';
            }
        exit;
    }
}


