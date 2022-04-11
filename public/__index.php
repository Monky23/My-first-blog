<?php
use Controllers\BlogController;
use Database\DBConnection;
use Exceptions\NotRouteFoundException;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('DB_NAME', 'blogdb_jm');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', '');

//composition root
$db = new DBConnection(DB_NAME , DB_HOST , DB_USER , DB_PWD);

//instantiate the controllers
$cntrllr = new BlogController($db);
$action = filter_input(INPUT_GET, $_GET["action"] , FILTER_DEFAULT);

if(!isset($action)){
    $cntrllr->welcome();
}
else {
    switch($_GET["action"]) {
        case "posts" :
            if(isset($_GET["postid"]))
                $cntrllr->show(intval($_GET["postid"]));
            else
                $cntrllr->index();
            break;
    
    }
}
