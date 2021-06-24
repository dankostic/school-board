<?php
require_once('vendor/autoload.php');
use Pecee\SimpleRouter\SimpleRouter;
use App\Controllers\SchoolController;
SimpleRouter::setDefaultNamespace('\App\Controllers');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
SimpleRouter::get('/', [SchoolController::class, 'index']);
use function Composer\Autoload\includeFile;

// Start the routing
SimpleRouter::start();

includeFile('views/main.php');
