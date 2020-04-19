<pre>
<?php

class Test{
   function __construct($id){
      echo "Infos from Class for id: $id";
   }
}

function info($id){
   echo "Infos for id: $id";
}

require_once('./app/Router.php');

$router = new Router();

$router->any('/', function(){
   echo 'home';
});

$router->add('GET', '/class/{id}/', 'Test');

$router->add('GET', '/info/{id}/', 'info');

$router->setDefault(function(){
   echo '404';
});

$router->run($_SERVER['REQUEST_METHOD'], '/'.$_GET['url']);
