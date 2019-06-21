<?php


namespace App\Controller\Home;


use App\Model\ChapterManager;

class HomeController
{
    public function home(){
        $chapter = new ChapterManager();
        $lastChapter = $chapter->getLastChapter();
        $firstChapter = $chapter->getFirstChapter();
        $allChapters = $chapter->getAllChapters();
        $lastThreeChapters = $chapter->getLastThreeChapters();
        require 'src/View/index/home.php';
    }
}