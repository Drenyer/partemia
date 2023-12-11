<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvisoController extends Controller
{
   public function RecuperarCliente(){
    try {
        $opiniones = DB::collection('opiniones')->get();
    } catch (\Exception $e) {
        return redirect('/foro')->with('error', 'Error de conexión a la base de datos.');
    }

    return view('opiniones.Mopiniones')->with('data', compact('opiniones'));

   }
}
