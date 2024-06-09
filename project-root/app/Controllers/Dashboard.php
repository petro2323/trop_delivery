<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FoodRestaurant;
use App\Models\UserFood;

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

    public function checkout()
    {
        $session = \Config\Services::session();
        $food_restaurant = new FoodRestaurant();
        $userFood = new UserFood();
        $json = $this->request->getJSON();

        if ($json) {
            $address = $json->address;
            $items = (array) $json->items;

            foreach($items as $title => $item) {
                $food = $food_restaurant->getFoodId($item->image_title);
                $data = [
                    'user_id' => $session->get('user_id'),
                    'food_id' => $food['food_id'],
                    'delivery_address' => $address,
                    'quantity' => $item->amount,
                    'food_price' => $item->price,
                    'pdv_price' => $item->pdv_price,
                    'delivery_price' => $item->delivery_price,
                    'final_price' => $item->final_price,
                    'order_date' => date("Y-m-d H:i:s")
                ];
                $userFood->insert($data);
            }
        }
    }
}