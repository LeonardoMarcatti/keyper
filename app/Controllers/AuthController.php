<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StaffModel;

class AuthController extends BaseController
{
    private object $model;

    public function login()
    {
        $this->model = new StaffModel();
        $data = $this->request->getPost(['staff', 'password']);
        $valid = $this->validateData($data, ['staff' => 'required|max_length[255]|min_length[3]', 'password' => 'required|max_length[255]|min_length[3]'], ['staff' => ['required' => 'Este campo é obrigatório', 'min_length' => 'Tamanho mínimo: 3 caracteres'], 'password' => ['required' => 'Este campo é obrigatório', 'min_length' => 'Tamanho mínimo: 3 caracteres']]);
        if ($valid) {
            $staffData = $this->model->getStaff($data['staff'], md5($data['password']));
            if ($staffData) {
                \session()->set(['id' => $staffData['id'], 'name' => $staffData['name'], 'boss' => $staffData['boss']]);
                if ($staffData['firstLogin'] == 1) {
                    return \redirect()->route('updatePassword');
                } else {
                   return \redirect()->route('mainPage');
                }
            } else {
                return \redirect()->route('home')->with('bad_login', 'Usuário e/ou senha inválidos');
            }
        } else {
            return \redirect()->route('home')->with('errors', $this->validator->getErrors());
        }
    }

    public function updatePassword()
    {
        if(!session()->has('id')){
            return \redirect()->route('mainPage');
        }
        return view('templates/simpleTop') . \view('updatePassword') . \view('templates/bottom');
    }

    public function postUpdatePassword()
    {
        $data = $this->request->getPost(['pass1', 'pass2']);
        $valid = $this->validateData($data, [
            'pass1' => 'required|max_length[255]|min_length[3]',
            'pass2' => 'required|max_length[255]|min_length[3]'],
            [
                'pass1' => ['required' => 'Campo obrigatório', 'min_length' => 'A senha é muito curta' ], 
                'pass2' => ['required' => 'Campo obrigatório', 'min_length' => 'A senha é muito curta' ]
            ]
        );

        if ($valid) {
            $this->model = new StaffModel();
            $update = $this->model->updatePassword(\session()->get('id'), $data['pass1']);
            if ($update) {
                return redirect()->route('home')->with('message', 'Senha atualizada com sucesso!');
            }
        } else {
            return \redirect()->route('setup')->with('errors', $this->validator->getErrors());
        }
    }

    public function logout()
    {
        \session()->destroy();
        return \redirect()->route('home');
    }

    public function check()
    {
        $data =  \session()->has('name') ?  \session()->get() : 'error' ;
        var_dump($data);

    }

    public function postUpdateLogin()
    {
        $data = $this->request->getPost(['name', 'name2']);
        $valid = $this->validateData($data, [
            'name' => 'required|min_length[3]', 'name2' => 'required|min_length[3]'],
            [
                'name' => ['required' => 'Campo obrigatório',  'min_length' => 'O login é muito curto'],
                'name2' => ['required' => 'Campo obrigatório', 'min_length' => 'O login é muito curto' ]
            ]
        );

        if ($valid) {            
            $this->model = new StaffModel();
            $update = $this->model->updateLogin($data['name'], \session()->get('id'));
            if ($update) {
                return \redirect()->route('home')->with('message', 'Login atualizado com sucesso!');
            }
        } else {
            return \redirect()->route('setup')->with('errors', $this->validator->getErrors());
        }
    }
}
