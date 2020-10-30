<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Cargo;
use App\Models\Chapa;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class ChapasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $cargos = Cargo::all()->where('eleicao',$id);
        return view('eleicao.chapa',compact('cargos'),compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $dados = $request->validate([
            'cargo' => 'required',
            'nome' => 'required',
            'cpf_t' => 'required',
            'cpf_s' => '',
        ]);

        $storeData = [
            'cargo' => $request->cargo,
            'nome' => $request->nome,
        ];

        $chapa = Chapa::create($storeData);

        $cpf = $request->cpf_t;        
        $titular = Pessoa::where('cpf',$cpf)->firstOrFail();
        $storeData = [
            'candidato' => $titular->id,
            'chapa' => $chapa->id,
            'posicao' => 'Titular',
        ];
        $candidato = Candidato::create($storeData);
        if ($request->cpf_s)
        {
            $cpf = $request->cpf_s;        
            $titular = Pessoa::where('cpf',$cpf)->firstOrFail();
            $storeData = [
                'candidato' => $titular->id,
                'chapa' => $chapa->id,
                'posicao' => 'Suplente',
            ];
            
            $candidato = Candidato::create($storeData);
        }

        return redirect('/eleicoes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
