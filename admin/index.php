<?php 

session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR); // Absoltley including the files as opposed to relatively
define('MODULE_PATH', ROOT_PATH . DIRECTORY_SEPARATOR  . 'modules' . DIRECTORY_SEPARATOR); // Absoltley including the files as opposed to relatively

define('ENCRYPTION_SALT', 'jkasdb2kj342k34bk'); 

//Router
require_once ROOT_PATH . 'src/controller.php';
require_once ROOT_PATH . 'src/template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Router.php';
require_once ROOT_PATH . 'src/Auth.php';
require_once MODULE_PATH . 'page/models/page.php';
require_once MODULE_PATH . 'users/models/User.php';

// $section = $_GET['section'] ?? $_POST['section'] ?? 'home';
 // These operators checks if it is null if no value gets final value 'show'. Much quicker than saying isset(); method
 //Boostrap

 DatabaseConnection::connect('localhost', '2021_cms', 'root', 'root');

// if / else logic 

$module = $_GET['module'] ?? $_POST['module'] ?? 'dashboard';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';



if ($module =='dashboard') {
    
    include MODULE_PATH . 'dashboard/admin/controllers/dashboardController.php';
    
    $dashboardController = new DashboardController();
    $dashboardController->runAction($action);
    
} 







