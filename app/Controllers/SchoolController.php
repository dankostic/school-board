<?php

namespace App\Controllers;
use App\Models\School;

/**
 * Class SchoolController
 * @package App\Controllers
 */
class SchoolController
{
    public function index(): string
    {
        return json_encode(School::students());
    }

    /**
     * @param int $id
     * @return string
     */
    public function show(int $id): string
    {
        return json_encode(School::show($id));
    }
}