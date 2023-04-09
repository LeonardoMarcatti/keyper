<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeyModel;

class KeysController extends BaseController
{
    private object $model;

    public function postRegisterKey()
    {
        $data = $this->request->getPost(['title']);
        $valid = $this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[3]'],
            [
                'title' => ['required' => 'Campo obrigatório', 'min_length' => 'A descrição é muito curta' ], 
            ]            
        );

        if ($valid) {
            $this->model = new KeyModel();
            $result = $this->model->addKey($data);
            if ($result) {
                return \redirect()->route('success')->with('font', \session()->set('origin', 'register_key'));
            }

            return \redirect()->route('keyError')->with('font', \session()->set('origin', 'register_key'));
            
        }
        return \redirect()->route('register_key')->with('errors', \session()->set('err', $this->validator->getErrors())); 

    }
}
