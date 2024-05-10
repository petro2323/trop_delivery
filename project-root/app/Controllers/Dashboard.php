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
}