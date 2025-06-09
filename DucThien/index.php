<?php
// Bật hiển thị lỗi PHP để dễ debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Require models
require_once 'app/models/ProductModel.php';
require_once 'app/models/UserModel.php';

// Xử lý URL
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// Xác định controller
$controllerName = isset($url[0]) && $url[0] != '' ? ucfirst($url[0]) . 'Controller' : 'ProductController';

// Xác định action
$action = isset($url[1]) && $url[1] != '' ? $url[1] : 'index';

// Require controller
$controllerPath = 'app/controllers/' . $controllerName . '.php';
if (!file_exists($controllerPath)) {
    die('Controller not found');
}
require_once $controllerPath;

// Tạo controller
$controller = new $controllerName();

// Check action tồn tại
if (!method_exists($controller, $action)) {
    die('Action not found');
}

// Gọi action
call_user_func_array([$controller, $action], array_slice($url, 2));
?>
