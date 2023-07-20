<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StaffModel;

class StaffController extends BaseController
{

    private object $model;

    public function addStaff()
    {
        $data = $this->request->getPost(['name', 'boss', 'password']);
        
        $valid = $this->validateData($data, [
            'name' => 'required|max_length[255]|min_length[3]',
            'password' => 'required|max_length[255]|min_length[3], is_unique'],
            [
                'name' => ['required' => 'Campo obrigatório', 'min_length' => 'O nome é muito curto' ], 
                'password' => ['required' => 'Campo obrigatório', 'min_length' => 'A senha é muito curta']
            ]            
        );

        if ($valid) {
            $this->model = new StaffModel();
            
            if ($this->model->getStaff($data['name'], md5($data['password']))) {
                return \redirect()->route('staffError')->with('font' ,\session()->set('origin', 'registerStaff'));
            } else {
                $this->model->addStaff($data['name'], md5($data['password']), $data['boss']);
                return \redirect()->route('success')->with('font' ,\session()->set('origin', 'registerStaff'));
            }
        }
        return \redirect()->route('registerStaff')->with('errors', \session()->set('err', $this->validator->getErrors())); 
    }
}
