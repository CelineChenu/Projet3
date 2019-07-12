<?php


namespace App\Controller\Comment;


use App\Model\Comment;
use App\Model\CommentManager;

class CommentController
{
    public function reportComment($chapterId, $commentId) {
        $comment = new Comment();
        $comment->setId($commentId);
        $reportComment = new CommentManager();
        $reportComment->postReported($comment);
        header('Location: http://localhost/projet3/chapitre/'. $chapterId);
    }

    public function addComment(){
        if(isset($_POST['username'])&& !empty($_POST['username'])&& isset($_POST['content'])&& !empty($_POST['content']) && isset($_POST['chapter_id'])&& !empty($_POST['chapter_id']))
        {
            $comment = new Comment();
            $comment->setContent($_POST['content']);
            $comment->setUsername($_POST['username']);
            $comment->setChapterId($_POST['chapter_id']);
            $addComment = new CommentManager();
            $addComment->postAdded($comment);
            header('Location: http://localhost/projet3/chapitre/'. $comment->getChapterId());
        }
        else {
            $_SESSION['comment-error'] = 'Une erreur s\'est produite, veuillez réessayer.' ;
            header('Location: http://localhost/projet3/chapitre/'. $_POST['chapter_id']);
        }
    }

}
