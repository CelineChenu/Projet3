<?php


namespace App\Controller\Chapter;

use App\Model\Chapter;
use App\Model\ChapterManager;
class PostController
{
    public function viewChapter($id)
    {
        $chapter = new Chapter();
        $chapter->setId($id);
        $chapterManager = new ChapterManager();
        $result = $chapterManager->getChapter($chapter);
        require 'src/View/chapter.php';
    }
}