<?php


namespace App\Controller\Chapter;


use App\Model\ChapterManager;

class PostsController
{
   public function chapters()
    {
        $chapter = new ChapterManager();
        $lastChapter = $chapter->getLastChapter();
        $firstChapter = $chapter->getFirstChapter();
        $allChapters = $chapter->getAllChapters();
        $lastThreeChapters = $chapter->getLastThreeChapters();
        require 'src/View/chapters.php';
    }

    public function chapterManagement()
    {
        if (! isset($_SESSION['auth'])) {header('Location:http://localhost/projet3/identification');};
        $chapter = new ChapterManager();

        $allChapters = $chapter->getAllChapters();
        require 'src/View/chaptermanagment.php';
    }

}