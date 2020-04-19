<pre>
<?php

require_once('./router.php');

$router = new router();

$router->any('/', function(){
   echo 'home';
});

$router->add('GET', '/info/{id}/', function($id) {
   echo "Infos for id: $id";
});

$router->setDefault(function(){
   echo '404';
});

$router->run($_SERVER['REQUEST_METHOD'], '/'.$_GET['url']);



   