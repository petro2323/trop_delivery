<?php

namespace App\Models;

use CodeIgniter\Model;

class FoodRestaurant extends Model
{
    protected $table            = 'food_restaurant';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['food_id', 'restaurant_id', 'price'];

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

    public function getFoodRestaurants($filter) {
        if($filter == 'all') {
            return $this->db->query('SELECT f.food_title, r.restaurant_title, r.location, fr.price, r.delivery_time FROM food_restaurant fr
                                INNER JOIN food f ON f.id = fr.food_id
                                INNER JOIN restaurant r ON r.id = fr.restaurant_id')->getResultArray();
        } else if($filter == 'best_selling') {
            return $this->db->query('SELECT f.food_title, r.restaurant_title, r.location, fr.price, r.delivery_time FROM food_restaurant fr
                                INNER JOIN food f ON f.id = fr.food_id
                                INNER JOIN restaurant r ON r.id = fr.restaurant_id WHERE price <= 10 AND price >= 5 OR price > 20')->getResultArray();
        }
    }
}
