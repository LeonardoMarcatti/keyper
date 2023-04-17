<?php

namespace App\Controllers;

use App\Models\KeyModel;
use App\Models\LogModel;
use App\Models\StaffModel;
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

    public function reportKey()
    {
        if (\session()->has('id')) {
            $this->data['report'] = null;
            $this->model = new KeyModel();
            $this->data['keys'] = $this->model->getAllKeys();
            return view('templates/top') . view('reportKey', $this->data) . view('templates/bottom');
        }
        return \redirect()->route('home');
    }

    public function postReportKey()
    {
        if (\session()->has('id')) {
            $this->data['report'] = null;
            $this->model = new KeyModel();
            $this->data['keys'] = $this->model->getAllKeys();
            $data = $this->request->getPost(['key']);
            $valid = $this->validateData($data, ['key' => 'required'], ['key' => ['required' => 'Selecione uma chave']]);
            if ($valid) {
                $this->model = new LogModel();
                $this->data['report'] = $this->model->reportKey($data['key']);
                return view('templates/top') . view('reportKey', $this->data) . view('templates/bottom');
            } else {
                return \redirect()->route('reportKey')->with('errors', \session()->set('err', $this->validator->getErrors()));
            }
        }

        return \redirect()->route('home');
    }

    public function reportUser()
    {
        if (\session()->has('id')) {
            $this->data['report'] = null;
            $this->model = new UserModel();
            $this->data['users'] = $this->model->getAllUsers();
            return view('templates/top') . view('reportUser', $this->data) . view('templates/bottom');
        }
        return \redirect()->route('home');
    }

    public function postReportUser()
    {
        if (\session()->has('id')) {
            $this->data['report'] = null;
            $this->model = new UserModel();
            $this->data['users'] = $this->model->getAllUsers();
            $data = $this->request->getPost(['user']);
            $valid = $this->validateData($data, ['user' => 'required'], ['user' => ['required' => 'Selecione um usuário']]);
            if ($valid) {
                $this->model = new LogModel();
                $this->data['report'] = $this->model->reportUser($data['user']);
                return view('templates/top') . view('reportUser', $this->data) . view('templates/bottom');
            } else {
                return \redirect()->route('reportUser')->with('errors', \session()->set('err', $this->validator->getErrors()));
            }
        }

        return \redirect()->route('home');
    }

    public function reportStaff()
    {
        if (\session()->has('id')) {
            $this->data['report'] = null;
            $this->model = new StaffModel();
            $this->data['staff'] = $this->model->getAllStaff();
            return view('templates/top') . view('reportStaff', $this->data) . view('templates/bottom');
        }
        return \redirect()->route('home');
    }

    public function postReportStaff()
    {
        if (\session()->has('id')) {
            $this->data['report'] = null;
            $this->model = new StaffModel();
            $this->data['staff'] = $this->model->getAllStaff();
            $data = $this->request->getPost(['staff']);
            $valid = $this->validateData($data, ['staff' => 'required'], ['staff' => ['required' => 'Selecione um staff']]);
            if ($valid) {
                $this->model = new LogModel();
                $this->data['report'] = $this->model->reportStaff($data['staff']);
                return view('templates/top') . view('reportStaff', $this->data) . view('templates/bottom');
            } else {
                return \redirect()->route('reportStaff')->with('errors', \session()->set('err', $this->validator->getErrors()));
            }
        }

        return \redirect()->route('home');
    }
}