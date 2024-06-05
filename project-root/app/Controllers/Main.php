<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\FoodRestaurant;

class Main extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function search_data() 
    {
        if (!isset($_SERVER['HTTP_REFERER'])) {
            header('HTTP/1.1 403 Forbidden');
            echo 'Access denied';
            exit;
        }
        
        $query = $this->request->getGet('query');
        $foods = new FoodRestaurant();
        $data = $foods->searchFood($query);

        if (!empty($data)) {
            foreach ($data as $row) {
                echo "<tr class=\"dashboard-card\">";
                echo "<td><img class=\"card-image\" src=\"" . base_url('food/' . $row['food_image']) . "\" alt=\"" . $row['food_title'] . "\"></td>";
                echo "<td>" . $row['food_title'] . "</td>";
                echo "<td>" . $row['restaurant_title'] . "</td>";
                echo "<td>" . $row['price'] . " €</td>";
                echo "</tr>";
            }
        }
    }
}
