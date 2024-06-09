<?php

namespace App\Models;

use CodeIgniter\Model;

class UserFood extends Model
{
    protected $table            = 'user_food';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'food_id', 'delivery_address', 'quantity', 'food_price', 'pdv_price', 'delivery_price', 'final_price', 'order_date', 'restaurant_id'];

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

    public function getUserHistoryInfo($user_id) {
        $sql = 'SELECT uf.id, uf.user_id, f.food_title, uf.delivery_address, uf.quantity, uf.food_price, uf.pdv_price, uf.delivery_price,
        uf.final_price, uf.order_date, r.restaurant_title FROM user_food uf
        INNER JOIN food f ON f.id = uf.food_id
        INNER JOIN restaurant r ON r.id = uf.restaurant_id WHERE uf.user_id = ?';

        return $this->db->query($sql, [$user_id])->getResultArray();
    }

}
