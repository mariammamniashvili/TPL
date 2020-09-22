<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{

      public function platform()
      {
        $insurance = Http::post('http://localhost:8080/aldagi/public/api/Insurance/List',[
            'system_id' => session('system_id'),
            'page'=>0,
        ]);
         $car_categories=self::CarCategory();
         $response=response($car_categories);
         $categories=$response->content();

         $car_models=self::CarModels();
         $response=response($car_models);
         $models=$response->content();

         return view('platform', compact('insurance','categories','models'));
      }
    public function CarCategory()
    {
        $categories = Http::get('http://localhost:8080/aldagi/public/api/Car/Categories');
        return $categories;
    }

    public function CarModels(){
        $models = Http::get('http://localhost:8080/aldagi/public/api/Car/Models');         
        return $models;
    }

    public function Refund(){
        $refund = Http::post('http://localhost:8080/aldagi/public/api/Refund/Maximum',[
            'external_system_id' => session('system_id'),
        ]);         
        return view("gela", compact('refund', $refund));
    }

    public function Price(){
        $price = Http::post('http://localhost:8080/aldagi/public/api/Price',[
            'external_system_id' =>session('system_id'),
            'max_limit_id' => '1',
        ]);         
        return view("gela", compact('price', $price));
    }
    public function  InsuranceList($system_id){
        $list = Http::post('http://localhost:8080/aldagi/public/api/Insurance/List',[
            'system_id' => $system_id,
        ]);         
        return view("platform", compact('list', $list));
    }
   
}
