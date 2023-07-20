<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CPFsModel;
use App\Models\UserModel;

class UsersController extends BaseController
{
    private object $model;

    public function addUser()
    {
        $data = $this->request->getPost(['name', 'cpf']);
        $valid = $this->validateData($data, [
            'name' => 'required|max_length[255]|min_length[3]',
            'cpf' => 'required|max_length[11]|min_length[11], is_unique'],
            [
                'name' => ['required' => 'Campo obrigatório', 'min_length' => 'O nome é muito curto' ], 
                'cpf' => ['required' => 'Campo obrigatório', 'min_length' => 'O CPF deve ter 11 dígitos', 'max_length' => 'O CPF deve ter 11 dígitos', 'is_unique' => 'CPF em uso']
            ]            
        );

        if ($valid) {
            $this->model = new CPFsModel();
            if ($this->model->addCPF($data['cpf'])) {
                $CPF_id = $this->model->checkCPF($data['cpf']);
                $this->model = new UserModel();
                if ($this->model->addUser($data['name'], $CPF_id['id'])) {
                    return \redirect()->route('success')->with('font' ,\session()->set('origin', 'registerUser'));
                } else {
                    return \redirect()->route('userError')->with('font' ,\session()->set('origin', 'registerUser'));
                }
            } else {
                return \redirect()->route('userError')->with('font' ,\session()->set('origin', 'registerUser'));
            }
        }
        return \redirect()->route('registerUser')->with('errors', \session()->set('err', $this->validator->getErrors())); 
    }
}
