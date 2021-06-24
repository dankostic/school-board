<?php


namespace App\Controllers;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController
{
    /**
     * @return string
     */
    public function index(): string
    {
        return '<div class="home-page">Home page</div>';
    }
}