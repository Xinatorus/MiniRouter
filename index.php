<pre>
<?php

class Test{
   private $var;

   function __construct(){
      $var = 'VAR';
      echo "Creating Test instance...\n";
   }
   public function objectMethod($id){
      echo "object method: $id";
      echo $this->var;
   }
   public static function staticMethod($id){
      echo "static method: $id";
   }
}

class ContructorOnly{
   function __construct($id){
      echo "Class constructor: $id";
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

$router->add('GET', '/class/{id}/', 'ContructorOnly');
$router->add('GET', '/static/{id}/', 'Test@staticMethod');
$router->add('GET', '/object/{id}/', 'Test@objectMethod');

$router->add('GET', '/function/{id}/', 'info');

$router->setDefault(function(){
   echo '404';
});

$router->run($_SERVER['REQUEST_METHOD'], '/'.$_GET['url']);
