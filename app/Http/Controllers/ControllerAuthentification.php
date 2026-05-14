<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aeroport;
use App\Models\Passager;
use App\Models\Vol;
use App\Models\PassagerVol;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ControllerAuthentification extends Controller {

    //site pr afficher le site de création de compte :
    public function createForm(){
        return view('Gestionnaire.createLogin');
    }

    //fcnt pr creer compte:
    public function create(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email', 
            'password'=>'required|min:4'
        ]); 

        User::create([
            'name'=>$request->input('name'), 
            'email'=>$request->input('email'), 
            'password'=>Hash::make($request->input('password'))
        ]); 
        return redirect()->route('auth.login');
        //echo "Registration successfull"; 

    }
    // fcnt pr afficher la page du compte:
    public function account(){
        return view('Gestionnaire.account');
    }

    //fnct pr afficher la page de login :
    public function login(){
        return view('Gestionnaire.login');
    }

    //fnct pr vérif les données et redirection vers page du compte:
    public function doLogin(Request $request){
        
        $request->validate([
            'email'=>'required|email', 
            'password'=>'required|min:4'
        ]); 
        
        $credentials = [
            'email'=>$request->input('email'), 
            'password'=>$request->input('password')
        ]; 
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate(); 
            return redirect()->route('auth.compte'); 
            } 
        else { //si on arrive ici, ca veut dire qu'il ne s'est pas connecté donc on le redirige quelques part 
            return redirect()->route('auth.login')->withErrors([
            'invalid'=>"Invalid email or password"
            ]);  
        }
    }

    //fnct pr logout
    public function logout(){
        Auth::logout(); 
        return to_route('auth.login'); 
    }
}