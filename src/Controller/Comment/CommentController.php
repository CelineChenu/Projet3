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
}