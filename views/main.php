<?php
use App\Controllers\SchoolController;
use function Composer\Autoload\includeFile;

$school = new SchoolController();

includeFile('views/layouts/header.php');

echo $school->index();

includeFile('views/layouts/footer.php');
