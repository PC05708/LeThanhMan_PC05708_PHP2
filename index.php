<?php
session_start();
require_once 'vendor/autoload.php';
define("ROOT_URL", "http://localhost:8000/");

// use App\Controllers\BaseController;
use App\Controllers\HomeController;
use App\Core\Route;
// new BaseController();

// new HomeController();

new Route;
