<?php
ob_start();

// ini_set('display_errors', 1);
// error_reporting(~0);

session_start();

require_once('autoloader.php');
require_once("helpers/helpers.php");

$request = str_replace("/", "", $_SERVER['REQUEST_URI']);
substr($request, 0, strrpos($request, '?'));

$productController = new ProductController();

switch ($request) {
    case '':
        $productController->index();
        break;
    case 'add-product':
        $productController->create();
        break;
    case 'store':
        $productController->store();
        break;
    case 'delete':
        $productController->destroy();
        break;
    default:
        http_response_code(404);
        require_once __DIR__ . '/views/404.php';
        break;
}
