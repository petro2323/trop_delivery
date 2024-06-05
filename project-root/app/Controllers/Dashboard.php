<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FoodRestaurant;

class Dashboard extends Controller
{
    public function allFood() 
    {
        $foodRestaurantModel = new FoodRestaurant();
        $data['foodRestaurants'] = $foodRestaurantModel->getFoodRestaurants('all', false);
        shuffle($data['foodRestaurants']);

        return view('dashboard', $data);
    }

    public function favoriteFood()
    {
        $foodRestaurantModel = new FoodRestaurant();
        $data['foodRestaurants'] = $foodRestaurantModel->getFoodRestaurants('best_selling', false);
        shuffle($data['foodRestaurants']);

        return view('dashboard', $data);
    }

    public function nearUser()
    {
        $ch = curl_init('https://api.ipgeolocation.io/ipgeo?apiKey=d345c82037b14905843f101a253728d5');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $json_data = json_decode($response, true);

        $foodRestaurantModel = new FoodRestaurant();
        $data['foodRestaurants'] = $foodRestaurantModel->getFoodRestaurants(false, $json_data['city']);
        
        shuffle($data['foodRestaurants']);

        return view('dashboard', $data);
    }

    public function getCodes()
    {
        
        if (!isset($_SERVER['HTTP_REFERER'])) {
            header('HTTP/1.1 403 Forbidden');
            echo 'Access denied';
            exit;
        }

        \Kint::$enabled_mode = false;
        
        $ch = curl_init('https://mocki.io/v1/5307c1f4-8eb9-4ba4-b255-9865ad71fbd1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }
}