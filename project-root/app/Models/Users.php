<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['first_name', 'last_name', 'email', 'username', 'password', 'user_type_id'];

    protected bool $allowEmptyInserts = false;

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

    public function getAllUsers() {
        $sql = 'SELECT id, first_name, last_name, email, username, user_type_id FROM users';

        return $this->db->query($sql)->getResultArray();
    }

    public function update_user_privilege($user_id, $user_type) {
        return $this->db->table('users')->where('id', $user_id)->update(['user_type_id' => $user_type]);
    }

    public function getUserData($user_id) {
        $sql = 'SELECT u.first_name, u.last_name, u.email, u.username, u.password, p.user_number FROM users u
        LEFT JOIN phone_number p ON p.id = u.phone_number_id WHERE u.id = ?';

        return $this->db->query($sql, [$user_id])->getResultArray();
    }
}