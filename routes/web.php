<?php
use Pecee\SimpleRouter\SimpleRouter;
use App\Controllers\HomeController;
use App\Controllers\SchoolController;
SimpleRouter::setDefaultNamespace('\App\Controllers');

SimpleRouter::get('/', [HomeController::class, 'index']);
SimpleRouter::get('students', [SchoolController::class, 'students']);

// Start the routing
SimpleRouter::start();