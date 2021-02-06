<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class PrevisaoClimaController extends Controller
{
    public function index()
    {
        $previsaoClima = DB::table('previsao_clima')->get();
        return $previsaoClima;
    }

    public function list(request $request)
    {
        $iDcidade = request()->iDcidade;
        $dias   = request()->dias;

        $dataAtual = Carbon::now()->toDateTimeString();
        $dataFutura = Carbon::parse($dataAtual)->addDays($dias);

        $previsao = DB::table('estado')
            ->join('cidade', 'cidade.estado_id', '=', 'estado.id')
            ->join('previsao_clima', 'previsao_clima.cidade_id', '=', 'cidade.id')
            ->where('cidade.id', '=', $iDcidade)
            ->whereBetween('data_previsao', [$dataAtual, $dataFutura])
            ->get();
        return $previsao;
    }
}
