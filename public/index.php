<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\dashboardController;
use App\Controllers\registerController;
use App\Controllers\SearchController;



$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Instantiate the controller based on the route
switch ($route) {
    // case 'home':
    //     $controller = new HomeController();
    //     $controller->Test();
    //     break;
    //  case 'page2':
    //         $controller = new HomeController();
    //         $controller->Test2();
    //         break;
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;

    
    case 'login':
        $logincontroller = new LoginController();
         $logincontroller->Login();
        break;
    case 'dashboard':
        $logincontroller = new dashboardController();
        $logincontroller->dashboard();
        break;
        case 'register':
            $logincontroller = new registerController();
            $logincontroller->register();
            break;

            case 'search':
                $logincontroller = new SearchController();
                $logincontroller->search();
                break;
            case 'candidat':
                    $controller = new dashboardController();;
                    $controller->candidat();
                    break;
            case 'offre':
            $controller = new dashboardController();;
            $controller->offre();
             break;
             case 'contact':
                $controller = new dashboardController();;
                $controller->contact();
                 break;



    // case 'creat':
    //         $logincontroller = new LoginController();
    //         $logincontroller->creat();
    //         break;
    // Add more cases for other routes as needed


    default:

        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

// Execute the controller action

?>