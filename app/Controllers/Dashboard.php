<?php
namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('layout/header')
            . view('dashboard')
            . view('layout/footer');
    }
}
