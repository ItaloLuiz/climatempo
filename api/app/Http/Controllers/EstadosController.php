<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EstadosController extends Controller
{
    public function index()
    {
        $estados = DB::table('estado')->get();
        return $estados;
    }
}
