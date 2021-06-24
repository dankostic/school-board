<?php

namespace App\Controllers;
use App\Models\School;
use App\Repository\SchoolRepository;

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
        $board = SchoolRepository::checkStudentBoard($id);
        return $board['board'] == 'csm' ?  json_encode(SchoolRepository::json($id)) : SchoolRepository::xml($id);
    }
}