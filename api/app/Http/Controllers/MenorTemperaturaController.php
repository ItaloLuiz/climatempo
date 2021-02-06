<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\MenorTemperatura;

class MenorTemperaturaController extends Controller
{
    public function index()
    {
        //$dataAtual = Carbon::now()->toDateTimeString();
        $dataAtual = '2021-02-01';

        $menorTemperatura = DB::table('estado')
            ->join('cidade', 'cidade.estado_id', '=', 'estado.id')
            ->join('previsao_clima', 'previsao_clima.cidade_id', '=', 'cidade.id')
            ->where('previsao_clima.data_previsao', '=', $dataAtual)
            ->orderBy('temperatura_maxima', 'asc')
            ->orderBy('data_previsao', 'desc')
            ->limit(3)
            ->get();
        return $menorTemperatura;
    }
}
