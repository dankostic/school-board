<?php
use App\Controllers\SchoolController;
use function Composer\Autoload\includeFile;

$school = new SchoolController();

includeFile('views/layouts/header.php');
?>
    <body>
    <div class="container">
    </div>
    </body>
<?php

includeFile('views/layouts/footer.php');
