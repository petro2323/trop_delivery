<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FoodRestaurant;

class Dashboard extends Controller
{
    public function allFood() 
    {
        $foodRestaurantModel = new FoodRestaurant();
        $data['foodRestaurants'] = $foodRestaurantModel->getFoodRestaurants('all');
        shuffle($data['foodRestaurants']);

        return view('dashboard', $data);
    }

    public function favoriteFood()
    {
        $foodRestaurantModel = new FoodRestaurant();
        $data['foodRestaurants'] = $foodRestaurantModel->getFoodRestaurants('best_selling');
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
        $temp_array = $foodRestaurantModel->getFoodRestaurants('all');
        $data['foodRestaurants'] = [];

        if(isset($temp_array)) {
            foreach($temp_array as $temp) {
                if($temp['location'] === $json_data['city']) {
                    $data['foodRestaurants'][] = $temp;
                }
            }
        }

        shuffle($data['foodRestaurants']);

        return view('dashboard', $data);
    }
}