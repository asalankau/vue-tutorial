<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class ProductController extends Controller
{
    public function index(){
        return view('product');
    }

    public function getProducts(){

        return [
            'name'=> 'Socks',
            'brand' => 'Vue Mastery',
            'selectedVariant' => 0,
            'inventory' => 8,
            'details' => [
                '80% cotton','20% polyster','Unisex'
            ],
            'variants' => [
                [
                    'id' => '2234',
                    'color' => 'green',
                    'variantImage' => "../images/vm_socks_green.png",
                    'variantQuantity' => 10,
                    'saleNow' => true,
                ],
                [
                    'id' => '2235',
                    'color' => 'blue',
                    'variantImage' => "../images/vm_socks_blue.png",
                    'variantQuantity' => 0,
                    'saleNow' => false,
                ],
            ]
        ];

    }
}
