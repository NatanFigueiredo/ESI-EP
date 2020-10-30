<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Pessoa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoginsController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store($id){
        $pessoa = Pessoa::find($id);
    }

    public function edit($id){
        if (session('id') != $id )
            redirect('/principal');

        $login = Login::findOrFail($id);
        return view('pessoa.alterar_senha', compact('login'));
    }

    public function update(Request $request, $id){

        $updateData = [
            'senha' => password_hash($request->novaSenha,PASSWORD_DEFAULT),
        ];
        Login::whereId($id)->update($updateData);
        return redirect('/principal');
    }

    public function logout(){

        session(['id' => null]);
        return redirect('/principal');
    }

    public function buscaLogin(Request $request){
        
        try{
            $loginData = Login::where('status',1)->where('login',$request->login)->first();
            if(password_verify($request->senha,$loginData->senha) && isset($loginData))
            {
                $nome = (isset($loginData->nomesocial)) ? $loginData->nomesocial : $loginData->nomecivil;
                session(['id' => $loginData->id]);
                return redirect('/principal');
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
