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
                echo "<tr>";
                echo "<td>";
                echo "<div class=\"custom-card\" id=\"search-result-card\">";
                echo "<img src=\"" . base_url('food/' . $row['food_image']) . "\" alt=\"" . $row['food_title'] . "\">";
                echo "<div class=\"container\" id=\"container-big\">";
                echo "<h4>" . $row['food_title'] . "</h4>";
                echo "<p>" . $row['restaurant_title'] . "</p>";
                echo "<p>" . $row['price'] . " €</p>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
        }
    }
}
