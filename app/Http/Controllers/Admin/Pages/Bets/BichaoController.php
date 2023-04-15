<?php

namespace App\Http\Controllers\Admin\Pages\Bets;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Cotacao;
use App\Models\TypeGame;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class BichaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->hasPermissionTo('create_game')) {
            abort(403);
        }

        $user_auth = Auth::user();
        $clientId = $user_auth['id'];
        $showList = false;

        $totalCarrinho = 0;


        $clients = Client::where('id','<=',5)->get();

        return view('admin.pages.bets.game.bichao.index', compact('clients','clientId','showList','totalCarrinho'));
    }

    public function group()
    {
        return view('admin.pages.bets.game.bichao.group');
    }

    public function centena()
    {
        return view('admin.pages.bets.game.bichao.centena');
    }

    public function dezena()
    {
        return view('admin.pages.bets.game.bichao.dezena');
    }

    public function milhar_centena(){
        return view('admin.pages.bets.game.bichao.milhar_centena');
    }

    public function terno_dezena()
    {
        return view('admin.pages.bets.game.bichao.terno_dezena');
    }

    public function terno_grupo()
    {
        return view('admin.pages.bets.game.bichao.terno_grupo');
    }

    public function duque_dezena()
    {
        return view('admin.pages.bets.game.bichao.duque_dezena');
    }

    public function duque_grupo()
    {
        return view('admin.pages.bets.game.bichao.duque_grupo');
    }

    public function cotacao(Response $response)
    {
        $cotacoes = Cotacao::all();

        return view('admin.pages.bets.game.bichao.cotacao',[
            'cotacoes' => $cotacoes
        ]);
    }

    public function my_bets(){
        return view('admin.pages.bets.game.bichao.minhas_apostas');
    }

    public function results(){
        return view('admin.pages.bets.game.bichao.resultados');
    }

    public function add_in_chart(Request $request){
        $data = $request->all();
        var_dump($data);
    }
}
