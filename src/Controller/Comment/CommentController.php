<?php


namespace App\Controller\Comment;


use App\Model\Comment;
use App\Model\CommentManager;

class CommentController
{

    public function moderationComments()
    {
        if (! isset($_SESSION['auth'])) {header('Location:http://localhost/projet3/identification');};
        $manager = new CommentManager();
        $comments = $manager->getCommentsReported();
        $commentsModerated = $manager->getCommentsModerated();
        require 'src/View/commentmoderation.php';
    }

    public function reportComment($chapterId, $commentId) {
        $commentManager = new CommentManager();
        $commentManager->postReported($commentId);
        header('Location: http://localhost/projet3/chapitre/'. $chapterId);
    }

    public function validateComment($commentId) {
        $commentManager = new CommentManager();
        $commentManager->validateComment($commentId);
        header('Location: http://localhost/projet3/moderation');
    }

    public function moderateComment($commentId) {
        $commentManager = new CommentManager();
        $commentManager->moderateComment($commentId);
        header('Location: http://localhost/projet3/moderation');
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
