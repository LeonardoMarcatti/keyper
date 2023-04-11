<?php

namespace App\Models;

use CodeIgniter\Model;

class KeyModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'keyss';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['label'];

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

    public function addKey(array $title)
    {
        if (!$this->checkKey($title['title'])) {
            $data = ['label' => $title['title']];
            $this->insert($data);
            return true;
        }

        return false;
    }

    private function checkKey(string $key)
    {
        $result = $this->select('id')->where('label', $key)->get()->getRowArray();
        return $result;
    }

    public function getAllKeys()
    {
        return $this->findAll();
    }
}