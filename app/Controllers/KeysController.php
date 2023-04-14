<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeyModel;
use App\Models\LogModel;

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

    public function taken()
    {
        $data = $this->request->getPost(['id_key', 'id_user']);
        $valid = $this->validateData($data, [
            'id_key' => 'required', 'id_user' => 'required'], ['id_key' => ['required' => 'O campo é obrigatório'], 'id_user' => ['required' => 'O campo é obrigatório']]);
        $data['staff'] = \session()->get('id');

        if ($valid) {
            $this->model = new LogModel();
            $this->model->addLog(\session()->get('id'), $data['id_key'], $data['id_user']);
            return \redirect()->route('success')->with('font', \session()->set('origin', 'taken'));
        }
            return \redirect()->route('taken')->with('errors', \session()->set('err', $this->validator->getErrors())); 
    }

    public function returnKey()
    {
       $data = $this->request->getPost(['key']);
       $valid = $this->validateData($data, ['key' => 'required'], ['key' => ['required' => 'Selecione uma chave']]);
       $data['staff'] = \session()->get('id');
       $data['date'] = date('Y-m-d h:i:s');

       if ($valid) {
        $this->model = new LogModel();
        $this->model->returnKey($data['key'], \session()->get('id'), $data['date']);
        return \redirect()->route('success')->with('font', \session()->set('origin', 'return'));
    }
        return \redirect()->route('return')->with('errors', \session()->set('err', $this->validator->getErrors())); 
    }
}
