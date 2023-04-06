<?php

namespace App\Controllers;

class PagesController extends BaseController
{
    public function index()
    {
        return view('templates/top') . view('home') . view('templates/bottom');
    }

    public function mainPage()
    {
        if (\session()->has('id')) {
            return view('templates/top') . view('mainPage') . view('templates/bottom');
        }

        return view('templates/top') . view('home') . view('templates/bottom');
    }

    public function logup()
    {
        return view('templates/top') . view('logup') . view('templates/bottom');
    }

    public function setup()
    {
        return "<h1>Página de Setup</h1>";
    }

    public function registerKey()
    {
        return view('templates/top') . view('regKey') . view('templates/bottom');
    }

    public function success()
    {
        return view('templates/top') . view('success') . view('templates/bottom');
    }
}
