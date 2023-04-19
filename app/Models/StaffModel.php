<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'staff';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['boss', 'name', 'password', 'firstLogin'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getStaff(string $staff, string $pass)
    {
        return $this->where(['name' => $staff, 'password' => $pass])->first();
    }

    public function updatePassword(string $id, string $pass)
    {
        $this->set('password', md5($pass))->set('firstLogin', 0)->where('id', $id)->update();
        return true;
    }

    public function updateLogin(string $name, string $id)
    {
        $this->set('name', $name)->where('id', $id)->update();
        return true;
    }

    public function getAllStaff()
    {
        return $this->orderBy('id')->findAll();
    }

    public function addStaff(string $staff, string $pass, string $boss = null)
    {
        if (!$this->getStaff($staff, $pass)) {
            $data = ['name' => $staff, 'password' => $pass, 'boss' => $boss];
            $this->insert($data);
            return true;
       }

       return false;
    }
}
