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

    public function setup()
    {
        if (\session()->has('id')) {
            return view('templates/top') . view('setup') . view('templates/bottom');
        }

        return \redirect()->route('home');
    }

    public function registerKey()
    {
        if (\session()->has('id')) {
            return view('templates/top') . view('regKey') . view('templates/bottom');
        }

        return \redirect()->route('home');
    }

    public function registerUser()
    {
        if (\session()->has('id')) {
            return view('templates/top') . view('registerUser') . view('templates/bottom');
        }

        return \redirect()->route('home');
    }

    public function registerStaff()
    {
        if (\session()->has('id')) {
            return view('templates/top') . view('registerStaff') . view('templates/bottom');
        }

        return \redirect()->route('home');
    }

    public function success()
    {
        if (\session()->has('id')) {
            return view('templates/top') . view('success') . view('templates/bottom');
        }
        return \redirect()->route('home');
    }

    public function keyError()
    {
        if (\session()->has('id')) {
            return view('templates/top') . view('keyError') . view('templates/bottom');
        }
        return \redirect()->route('home');
    }

    public function userError()
    {
        if (\session()->has('id')) {
            return view('templates/top') . view('userError') . view('templates/bottom');
        }
        return \redirect()->route('home');
    }

    public function staffError()
    {
        if (\session()->has('id')) {
            return view('templates/top') . view('staffError') . view('templates/bottom');
        }
        return \redirect()->route('home');
    }
}
