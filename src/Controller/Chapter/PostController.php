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

    public function chapterCreation()
    {
       if (!isset($_SESSION['auth'])) {header('location:http://localhost/projet3/identification');}

        $chapter = new ChapterManager();
        require 'src/View/chaptercreation.php';


    }


    public function addChapter()
    {
        if(isset($_POST['title'])&& !empty($_POST['title'])&& isset($_POST['chapter_number'])&& !empty($_POST['chapter_number']) && isset($_POST['content'])&& !empty($_POST['content']))
        {
            $chapter = new Chapter();
            $chapter->setTitle($_POST['title']);
            $chapter->setChapterNumber($_POST['chapter_number']);
            $chapter->setContent($_POST['content']);
            $addChapter = new ChapterManager();
            $addChapter->chapterAdded($chapter);
            header('Location: http://localhost/projet3/gestion-chapitres/');
        }
        else {
            $_SESSION['comment-error'] = 'Une erreur s\'est produite, veuillez réessayer.' ;
            header('Location: http://localhost/projet3/gestion-chapitres/');
        }
    }


    public function chapterEdition($id)

    {
        if (! isset($_SESSION['auth'])) {header('Location:http://localhost/projet3/identification');};
        $chapterManager = new ChapterManager();
        $chapter = $chapterManager->editionChapter($id);
        require 'src/View/chapteredition.php';
    }

    public function deleteChapter($id)

        {
            $chapter = new Chapter();
            $chapter->setId($id);
            $chapterManager = new ChapterManager();
            $deleteChapter = $chapterManager->deleteChapter($id);
            header ('Location:http://localhost/projet3/gestion-chapitres/');
        }

    public function editChapter(){

        if(isset($_POST['title'])&& !empty($_POST['title'])&& isset($_POST['chapter_number'])&& !empty($_POST['chapter_number']) && isset($_POST['content'])&& !empty($_POST['content']) && isset($_POST['chapter_id'])&& !empty($_POST['chapter_id']))
        {
            $chapter = new Chapter();
            $chapter->setTitle($_POST['title']);
            $chapter->setChapterNumber($_POST['chapter_number']);
            $chapter->setContent($_POST['content']);
            $chapter->setId($_POST['chapter_id']);
            $editChapter = new ChapterManager();
            $editChapter->chapterEdited($chapter);
            header('Location: http://localhost/projet3/gestion-chapitres/');
        }
        else {
            $_SESSION['chapter-error'] = 'Une erreur s\'est produite, veuillez réessayer.' ;
        }
    }
}
