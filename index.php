        <?php
        require 'vendor/autoload.php';

        $router = new App\Router\Router($_GET['url']);

        $router->get('/', function(){ echo "Homepage"; });
        $router->get('/chapters', function(){ echo 'Tous les chapitres'; });
        $router->get('/chapters/:slug-:id', "Posts#show")->with('slug', '[a-z\-0-9]+')->with('id', '[0-9]+');
        $router->get('chapters/:id', "Posts#show");
        $router->post('/chapters/:id', function($id){

        });

        $router->run();