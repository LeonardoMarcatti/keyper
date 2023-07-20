<?php

namespace App\Models;

use CodeIgniter\Model;

class CPFsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cpfs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['number'];

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

    public function checkCPF($cpf)
    {
        return $this->select('id')->where('number', $cpf)->get()->getRowArray();
    }

    public function addCPF(string $cpf)
    {
        if (!$this->checkCPF($cpf)) {
            $data = ['number' => $cpf];
            $this->insert($data);
            return true;
        }

        return false;
    }
}
