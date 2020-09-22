<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Authentification;
use App\Register;
use Illuminate\Session\Store;
use Illuminate\Routing\ResponseFactory;

class AuthentificationController extends Controller
{
    public function index(){
        return view('Authentification/login');
    }

    public function register(){
        return view('Authentification/register');
    }

    public function system_login(Request $request){
       
        $login = Http::post('http://localhost:8080/aldagi/public/api/Login', [
            'system_name' =>$request->input('user_name'),
            'password' =>$request->input('password'),
        ]);

        $status_code=$login->getStatusCode();
        $response=response($login);
        $body = $response->content();
        if($status_code == 200)
        {
            Session::put('system_id',  $body);
            Session::put('username', $request->input('user_name'));
            return redirect('/platform');
        }
            return $response;
    }

    public function system_registration(Request $request){
     
        $registration = Http::post('http://localhost:8080/aldagi/public/api/Company/Registration', [
            'system_name' => $request->input('user_name_1'),
            'password' => $request->input('password_1'),
        ]);
        
        $response=response($registration);
        $status_code=$registration->getStatusCode();
        
        if($status_code == 201){
            return redirect('platform');;
        }
            return $response;
     }

     public function user_registration(Request $request){
      
        $image = base64_encode($request->input('image'));
        $registration = Http::post('http://localhost:8080/aldagi/public/api/Insurance/Register',[
            'system_id' => session('system_id'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'user_id' => $request->input('user_id'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'birthday' => $request->input('birthday'),
            'manufacturer' =>$request->input('categories'),
            'model' => $request->input('models'),
            'issue_date' => $request->input('issue_date'),
            'registration_number' => $request->input('registration_number'),
            'photo' => $image,
            'status' => 0,
            'is_deleted' => 0,
        ]);
        
        $status_code=$registration->getStatusCode();
        $response=response($registration);
        if($status_code == 201){
          return redirect('/platform');
        }
          return $status_code;
     }

     public function update_delete_status(Request $request){
        $update_delete_status = Http::get('http://localhost:8080/aldagi/public/api/Delete/'.$request->user_id.'');         
        return redirect('/platform');    
     }

      public function update_status(Request $request){
        if($request->status == 1){$status=2;}else{$status=1;}
        $update_status = Http::get('http://localhost:8080/aldagi/public/api/Status/'.$request->user_id.'/'.$status.'');         
        return redirect('/platform');    
     }
     
}
