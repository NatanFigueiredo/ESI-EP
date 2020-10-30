<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Cargo;
use App\Models\Chapa;
use App\Models\Eleicao;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class VotacaosController extends Controller
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
        $eleicao = Eleicao::findOrFail($id);
        $arrayFinal = array();
        $cargos = Cargo::all()->where('eleicao',$id);
        foreach($cargos as $c)
        {   
            $cargosFinais = [
                'id' => $c->id,
                'cargo' => $c->cargo,
            ];
            $chapasCargo = array();
            $chapas = Chapa::all()->where('cargo',$c->id);
            foreach ($chapas as $ch)
            {   
                $chapaFinal = [
                    'id' => $ch->id,
                    'nome' => $ch->nome,
                ];
                $candidatos = Candidato::all()->where('chapa',$ch->id);
                foreach ($candidatos as $ca)
                {
                    $pessoa = Pessoa::where('id',$ca->candidato)->first();
                    $nome = (isset($pessoa->nomesocial)) ? $pessoa->nomesocial : $pessoa->nomecivil ;

                    if (strcmp($ca->posicao, 'Titular') == 0)
                        $chapaFinal['titular'] = $nome;
                    else
                        $chapaFinal['suplente'] = $nome;
                }
                $chapasCargo[] = $chapaFinal;
            }
            $cargosFinais['chapas'] = $chapasCargo;
            $arrayFinal[] = $cargosFinais;
        }

        return view('eleicao.votacao',compact('eleicao'),compact('arrayFinal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //Uma requisão com [id do membro, id da eleição, [chapas votadas]] onde chapas votadas = ['idcargo'=>'idchapa' ou 0 para branco]
    {
        $userID = $request->membro;
        $electionID = $request->eleicao;
        $chapasVotoadas = $request->chapasVotadas;
        foreach($chapasVotoadas as $chapa)
        {
            
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
