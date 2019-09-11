        <?php
        session_start();
        require 'vendor/autoload.php';
        $params = parse_ini_file('params.ini');

        define('HOST', $params['host_base']);
        define('LOGIN_BDD', $params['login_bdd']);
        define('HOST_BDD', $params['host_bdd']);
        define('DB_NAME', $params['db_name']);

        define('PWD_BDD', "");


        $router = new App\Router\Router($_GET['url']);

        $router->get('/', "Home\Home#home");
        $router->get('/chapitres', "Chapter\Posts#chapters");
        $router->get('/chapitre/:id', "Chapter\Post#viewChapter")->with('id', '[0-9]+');
        $router->get('/signaler-commentaire/:id_chapter-:id_comment', "Comment\Comment#reportComment")->with('id_chapter', '[0-9]+')->with('id_comment', '[0-9]+');
        $router->post('/ajouter-commentaire', "Comment\Comment#addComment");
        $router->get('/contact', "Contact\Contact#contact");
        $router->post('/envoyer-mail', "Contact\Contact#sendMail");
        $router->get('/identification', "User\User#login");
        $router->post('/login', "User\User#auth");
        $router->get('/newuser', "User\User#newUser");
        $router->post('/adduser',"User\User#addUser");
        $router->get('/administration', "User\User#admin");
        $router->get('/logout',"User\User#sessionFinish");
        $router->get('/moderation',"Comment\Comment#moderationComments");
        $router->get('/gestion-chapitres',"Chapter\Posts#chapterManagement");
        $router->get('/nouveau-chapitre',"Chapter\Post#chapterCreation");
        $router->get('/modifier-chapitre/:id',"Chapter\Post#chapterEdition")->with('id', '[0-9]+');
        $router->get('/supprimer-chapitre/:id',"Chapter\Post#deleteChapter")->with('id', '[0-9]+');
        $router->post('/add-chapter',"Chapter\Post#addChapter");
        $router->post('/edit-chapter',"Chapter\Post#editChapter");
        $router->get('/valider-commentaire/:id_comment', "Comment\Comment#validateComment")->with('id_comment', '[0-9]+');
        $router->get('/moderer-commentaire/:id_comment', "Comment\Comment#moderateComment")->with('id_comment', '[0-9]+');

        $router->get('/route-test', "Home\Home#test");

        $router->run();