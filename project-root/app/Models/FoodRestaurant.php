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

    public function getFoodRestaurants($statement, $cityName) {
        $sql = 'SELECT f.food_title, r.restaurant_title, r.location, fr.price, r.delivery_time, fr.food_image FROM food_restaurant fr
        INNER JOIN food f ON f.id = fr.food_id
        INNER JOIN restaurant r ON r.id = fr.restaurant_id';
        
        if ($statement == 'all' && $cityName == false) {
            return $this->db->query($sql)->getResultArray();
        } else if ($statement == 'best_selling' && $cityName == false) {
            $best_selling_sql = $sql . ' WHERE (price <= ? AND price >= ?) OR price > ?';
            return $this->db->query($best_selling_sql, [10,5,20])->getResultArray();
        } else if ($statement == false) {
            $near_user_sql = $sql . ' WHERE r.location = ?';
            return $this->db->query($near_user_sql, [$cityName])->getResultArray();
        }
    }

    public function searchFood($food) {
        $sql = 'SELECT f.food_title, r.restaurant_title, fr.price, fr.food_image FROM food_restaurant fr
        INNER JOIN food f ON f.id = fr.food_id
        INNER JOIN restaurant r ON r.id = fr.restaurant_id WHERE f.food_title LIKE ?';

        return $this->db->query($sql, ["%$food%"])->getResultArray();
    }
}
