<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CidadesController extends Controller
{
    public function index()
    {
        $cidades = DB::table('cidade')->get();
        return $cidades;
    }
}
