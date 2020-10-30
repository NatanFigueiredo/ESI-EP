<?php

namespace App\Http\Controllers;

use App\Models\Eleicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EleicaosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eleicoes = Eleicao::all();
        return view('eleicao.eleicao_geral',compact('eleicoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'data_inicio' => 'required',
            'data_fim' => 'required',
            'titulo' => 'required',
        ]);
        $eleicao = Eleicao::create($storeData);
        return redirect('/eleicoes')->with('completed','Eleição registrada');
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
    public function edit($id) //Deve retornar só um elemento, tá blz
    {
        $el = Eleicao::findOrFail($id);
        $eleicoes = Eleicao::all();
        return view ('eleicao.eleicao_edit',compact('el'),compact('eleicoes'));
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
        $updateData = $request->validate([
            'data_inicio' => 'required',
            'data_fim' => 'required',
            'titulo' => 'required',
            'flag_status' => 'required',
        ]);
        Eleicao::whereId($id)->update($updateData);
        print_r($updateData);

        return redirect('/eleicoes')->with('completed','Eleição atualizada');
    }

    public function convertStatus($data)
    {
        switch($data){
            case 0: return "Encerrada";
                break;
            case 1: return "Aberta para candidatura";
                break;
            case 2: return "Aberta para votar";
                break;
        }
    }
}
