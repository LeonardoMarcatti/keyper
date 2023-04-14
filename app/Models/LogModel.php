<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'logs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_staff', 'id_key', 'id_user', 'date_taken', 'returned', 'id_staff_returned', 'date_returned'];

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

    public function addLog(string $id_staff, string $id_key, string $id_user)
    {
        $data = ['id_staff' => $id_staff, 'id_user' => $id_user, 'id_key' => $id_key];
        $this->insert($data);
        return true;
    }

    public function getTakenKeys()
    {
        return $this->table('logs')->select('logs.id as id, logs.date_taken as data, s.name as name, s.id as id_staff, k.label as key, k.id as id_key, u.name as User, u.id as id_user')->join('keyss as k', 'k.id = logs.id_key')->join('staff as s', 'logs.id_staff = s.id')->join('users as u', 'logs.id_user = u.id')->where('logs.returned = 0')->get()->getResultArray();
    }

    public function getAvailableKeys()
    {
        return $this->select('id_key')->distinct()->where('logs.returned = 0')->get()->getResultArray();
    }

    public function returnKey(string $key, string $staff, string $date)
    {
        $this->set('returned', 1)->set('id_staff_returned', $staff)->set('date_returned', $date)->where('id_key', $key)->update();
    }
}