<?php
require_once('vendor/autoload.php');

use App\Controllers\SchoolController;

$school = new SchoolController();
echo $school->index();