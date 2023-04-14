<?php

namespace App\Controllers;

use App\Models\KeyModel;
use App\Models\LogModel;
use App\Models\UserModel;

class PagesController extends BaseController
{
    private array $data;
    private object $model;

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

    public function return()
    {
        if (\session()->has('id')) {
            $this->model = new LogModel();
            $this->data['log'] = $this->model->getTakenKeys();
            return view('templates/top') . view('return', $this->data) . view('templates/bottom');
        }
        return \redirect()->route('home');
    }

    private function orderKeys(array $keys)
    {
        $ordered = [];

        foreach ($keys as $key => $value) {
            $ordered[] = $value['id_key'];
        }

        return $ordered;
    }

    public function taken()
    {
        if (\session()->has('id')) {
            $this->model = new LogModel();
            $this->data['taken'] = $this->model->getUnAvailableKeys();
            $this->data['taken'] = $this->orderKeys($this->data['taken']);
            $this->model = new KeyModel();
            $this->data['keys'] = $this->model->getAllKeys();
            $this->model = new UserModel();
            $this->data['users'] = $this->model->getAllUsers();
            return view('templates/top') . view('taken', $this->data) . view('templates/bottom');
        }
        return \redirect()->route('home');
    }

    public function transfer()
    {
        if (\session()->has('id')) {
            $this->model = new LogModel();
            $this->data['taken'] = $this->model->getUnAvailableKeys();
            $this->data['taken'] = $this->orderKeys($this->data['taken']);
            $this->model = new KeyModel();
            $this->data['keys'] = $this->model->getAllKeys();
            $this->model = new UserModel();
            $this->data['users'] = $this->model->getAllUsers();
            return view('templates/top') . view('transfer', $this->data) . view('templates/bottom');
        }
        return \redirect()->route('home');
    }


}