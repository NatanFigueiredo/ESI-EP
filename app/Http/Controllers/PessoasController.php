<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoa = Pessoa::all();
        return view('pessoa.pessoa_geral', compact('pessoa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!session('id')) 
            return redirect('/login');
        return $this->index();
    }
    public function createNew()
    {
        if (!session('id')) 
            return redirect('/login');
        return view('pessoa.pessoa_novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $storeData = $request->validate([
            'nomecivil' => 'required|max:100',
            'nomesocial' => 'max:100',
            'rg' => 'required|max:9',
            'cpf' => 'required|max:11',
            'funcao' => 'required|max:50',
            'data_nasc' => 'required',
            'email' => 'required|max:100',
            'celular' => 'required|max:20',
        ]);

        $pessoa = Pessoa::create($storeData); 

        $storeData = [
            'id' => $pessoa->id,
            'login' => $pessoa->cpf,
            'senha' => password_hash($pessoa->datanasc, PASSWORD_DEFAULT),
            'lastLogin' => date('m/d/Y'),
        ];

        $login = Login::create($storeData);

        return redirect('/pessoa');
    }

    public function meusdados($id){
        if (session('id') != $id )
            redirect('/principal');

        $pessoa = Pessoa::findOrFail($id);
        $temp = $this->convertStatus($pessoa->flag_status);
        $pessoa->flag_status = $temp;
        return view('pessoa.meus_dados', compact('pessoa'));
    }

    public function edit($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $temp = $this->convertStatus($pessoa->flag_status);
        $pessoa->flag_status = $temp;
        return view('pessoa.pessoa_edit', compact('pessoa'));
        /*$pessoaData = DB::table('pessoas')->where('flag_status',1)->where('id',$id)->get()->all()[0];
        $pessoa = new Pessoa();
        $pessoa->fill([
            'id' => $id,
            'nomecivil' => $pessoaData->nomecivil,
            'nomesocial' => $pessoaData->nomesocial,
            'rg' => $pessoaData->rg,
            'cpf' => $pessoaData->cpf,
            'funcao' => $pessoaData->funcao,
            'data_nasc' => $pessoaData->data_nasc,
            'email' => $pessoaData->email,
            'celular' => $pessoaData->celular,
            'flag_status' => $pessoaData->flag_status]);*/
    }
    public function update(Request $request, $id){

        $updateData = $request->validate([
            'nomecivil' => 'required|max:100',
            'nomesocial' => 'max:100',
            'rg' => 'required|max:9',
            'cpf' => 'required|max:11',
            'funcao' => 'required|max:50',
            'data_nasc' => 'required',
            'email' => 'required|max:100',
            'celular' => 'required|max:20',
            'flag_status' => 'required|max:20',
        ]);

        Pessoa::whereId($id)->update($updateData);
        return redirect('/pessoa');

        /*$pessoa = new Pessoa();
        $pessoa->fill([
            'idpessoa' => $id,
            $storeData,
            'flag_status' => $this->convertStatus($request->flag_status),
        ]);

        $pessoa->update();*/

        /*$storeData = [
            'idpessoa' => $id,
            $storeData,
            'flag_status' => $this->convertStatus($request->flag_status)];*/

        //Pessoa::whereId('idpessoa',$id)->update(array('nomesocial' => 'abc'));
        //print_r($request->flag_status);
        
        //$abc = DB::table('pessoas')->where('idpessoa',$id)->update(array(['nomesocial' => 'abc']));
    }

    public function convertStatus($data)
    {
        switch($data){
            case 0: return "Desligado";
                break;
            case 1: return "Ativo";
                break;
            case 2: return "Para aprovar";
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
