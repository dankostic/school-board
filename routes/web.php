<?php
use Pecee\SimpleRouter\SimpleRouter;
use App\Controllers\HomeController;
use App\Controllers\SchoolController;
SimpleRouter::setDefaultNamespace('\App\Controllers');

SimpleRouter::get('/', [HomeController::class, 'index']);
SimpleRouter::get('students', [SchoolController::class, 'index']);
SimpleRouter::get('students/{id}', [SchoolController::class, 'show']);

// Start the routing
SimpleRouter::start();