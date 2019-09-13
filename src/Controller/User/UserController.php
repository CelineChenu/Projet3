<?php


namespace App\Controller\User;


use App\Model\ChapterManager;
use App\Model\CommentManager;
use App\Model\UserManager;
use App\Model\User;

class UserController
{
    public function login()
    {
        require('src/View/login.php');
    }

    public function newUser()
    {
        require('src/View/newuser.php');
    }

    public function addUser()
    {
        if(isset($_POST['username'])&& !empty($_POST['username'])&& isset($_POST['login'])&& !empty($_POST['login']) && isset($_POST['password'])&& !empty($_POST['password']))
            {
                $user = new User();
                $user->setUsername($_POST['username']);
                $user->setLogin($_POST['login']);
                $user->setPassword(password_hash($_POST['password'],PASSWORD_DEFAULT));
                $userManager = new UserManager();
                $userManager->userAdded($user);
                header('Location: http://localhost/projet3/newuser/');
            }
        else
            {
            $_SESSION['comment-error'] = 'Une erreur s\'est produite, veuillez réessayer.' ;
            header('Location: http://localhost/projet3/administration/');
            }
    }

    public function auth()
    {
        if(isset($_POST['login'])&& !empty($_POST['login'])&& isset($_POST['password'])&& !empty($_POST['password']))
            {
                $manager = new UserManager();
                $user = $manager->getUserByName($_POST['login']);

                $hash = $user->getPassword();
                if (password_verify($_POST['password'], $hash))
                    {
                        $_SESSION['auth'] = 1;
                        $_SESSION['username'] = $user->getUsername();
                        $_SESSION['login'] = $user->getLogin();
                        header('Location: http://localhost/projet3/administration/');

                    }
                else
                    {
                    $_SESSION['flashmessage'] = "Vos identifiants ne sont pas reconnus.";
                    header('Location: http://localhost/projet3/identification/');
                    }
            }
    }

    public function admin()
    {
        if (! isset($_SESSION['auth'])) {header('Location:http://localhost/projet3/identification');}
        $chapterManager = new ChapterManager();
        $commentManager = new CommentManager();
        $adminChapters = $chapterManager->getAdminChapters();
        $comments = $commentManager->lastComments();
        $numberReport = $commentManager->numberReports();
        $numberComment = $commentManager->numberComment();
        $numberChapter = $chapterManager->numberChapter();

        require('src/View/admin.php');
    }

    public function sessionFinish()
    {
        $_SESSION = array();
        setcookie(session_name(), '', time());
        session_destroy();
        header('Location: http://localhost/projet3/');
    }
}