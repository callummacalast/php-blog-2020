<?php 

session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR); // Absoltley including the files as opposed to relatively
define('MODULE_PATH', ROOT_PATH . DIRECTORY_SEPARATOR  . 'modules' . DIRECTORY_SEPARATOR); // Absoltley including the files as opposed to relatively
//Router
require_once ROOT_PATH . 'src/controller.php';
require_once ROOT_PATH . 'src/template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Router.php';
require_once MODULE_PATH . 'page/models/page.php';

// $section = $_GET['section'] ?? $_POST['section'] ?? 'home';
 // These operators checks if it is null if no value gets final value 'show'. Much quicker than saying isset(); method
 //Boostrap

 //Routing
$action = $_GET['seo_name'] ?? 'home';
DatabaseConnection::connect('localhost', '2021_cms', 'root', 'root');


$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();

$router = new Router($dbc);

$router->findBy('pretty_url', $action);
$action  = $router->action != '' ? $router->action : 'default';

$moduleName = ucfirst($router->module) . 'Controller';

$controllerFile = MODULE_PATH . $router->module . '/controllers/' . $moduleName . '.php';

if (file_exists($controllerFile)) {

  include $controllerFile;

  $controller = new $moduleName();
  $controller->setEntityId($router->entity_id);
  $controller->runAction($action);

};




