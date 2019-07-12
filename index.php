        <?php
        require 'vendor/autoload.php';

        $router = new App\Router\Router($_GET['url']);

        $router->get('/', "Home\Home#home");
        $router->get('/chapitres', "Chapter\Posts#chapters");
        $router->get('/chapitre/:id', "Chapter\Post#viewChapter")->with('id', '[0-9]+');
        $router->get('/signaler-commentaire/:id_chapter-:id_comment', "Comment\Comment#reportComment")->with('id_chapter', '[0-9]+')->with('id_comment', '[0-9]+');
        $router->post('/ajouter-commentaire', "Comment\Comment#addComment");
        $router->get('contact', "Contact\Contact#contact");
        $router->post('/envoyer-mail', "Contact\Contact#sendMail");
        $router->run();