<?php

namespace App\Controllers;
use App\Models\School;

/**
 * Class SchoolController
 * @package App\Controllers
 */
class SchoolController
{
    public function index()
    {
        return School::students();
    }
}