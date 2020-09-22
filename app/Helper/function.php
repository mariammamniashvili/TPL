<?php

namespace App\function;
use App\Models\User\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Validate;
use App\Models\System\Registrations;

class function 
{
     public function CarCategory(){
        $categories = Http::get('http://localhost:8080/aldagi/public/api/Car/Categories');         
        return view("gela", compact('categories', $categories));
    }
    public function CarModels(){
        $models = Http::get('http://localhost:8080/aldagi/public/api/Car/Models/1');         
        return view("gela", compact('models', $models));
    }

      public function Refund(){
        $refund = Http::post('http://localhost:8080/aldagi/public/api/Refund/Maximum',[
        'external_system_id' => '1',
        ]);         
        return view("gela", compact('refund', $refund));
    }

    public function Price(){
        $price = Http::post('http://localhost:8080/aldagi/public/api/Price',[
        'external_system_id' => '1',
        'max_limit_id' => '1',
        ]);         
        return view("gela", compact('price', $price));
    }
    public function  InsuranceList($system_id){
        $price = Http::post('http://localhost:8080/aldagi/public/api/Insurance/List',[
        'system_id' => $system_id,
        ]);         
        return view("gela", compact('price', $price));
    }
   
}
