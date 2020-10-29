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
        $eleicao = Eleicao::all();
        return view('eleicao',compact($eleicao));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eleicao.geral');
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

        return redirect('/eleicao')->with('completed','Eleição registrada');
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
        $eleicao = Eleicao::findOrFail($id)->where('status',1);
        return view ('eleicao.edit',compact('eleicao'));
        /*$eleicaoDB = DB::table('eleicoes')->where('status',1)->where('ideleicao',$id);
        $eleicao = new Eleicao;
        $eleicao->fill([
            'data_inicio' => $eleicaoDB->data_inicio, 
            'data_fim' => $eleicaoDB->data_fim, 
            'titulo' => $eleicaoDB->titulo,
            'flag_status' => $eleicaoDB->flag_status]);*/
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

        return redirect('/eleicao')->with('completed','Eleição atualizada');
    }

}
