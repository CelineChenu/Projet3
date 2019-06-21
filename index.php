        <?php
        require 'vendor/autoload.php';

        $router = new App\Router\Router($_GET['url']);

        $router->get('/', "Home\Home#home");
        $router->get('/chapitres', "Chapter\Posts#chapters");
        $router->get('/chapitre/:id', "Chapter\Post#viewChapter")->with('id', '[0-9]+');

        $router->run();