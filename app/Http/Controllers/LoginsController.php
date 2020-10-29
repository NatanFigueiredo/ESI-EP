<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoginsController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function buscaLogin(Request $request){
        
        
        try{
            $loginData = DB::table('logins')->where('status',1)->where('login',$request->login)->value('senha');
            if(password_verify($request->senha,$loginData) && isset($loginData))
            {
                $request->session()->put('user_logado',$request->login);
                return redirect('/principal')->with('login',$request->login);
            }
            else{
                throw new Exception();
            }
        }
        catch(Exception $e){
            return back()->withError('Algo deu errado');
        }
    }
}
