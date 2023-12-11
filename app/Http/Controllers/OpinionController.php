<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Client;
use MongoDB\BSON\UTCDateTime;
use Carbon\Carbon;



class OpinionController extends Controller
{

    public function formCrear()
    {
        return view('opiniones.crear');
    }

    public function crearOpinion(Request $request)
    {

        $data = $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'opinion' => 'required|string',
            'valor' => 'required|integer|between:1,5',
        ]);

        $fechaHoraActual = new UTCDateTime(Carbon::now());
        $opinion = [
            'nombre' => $data['nombre'],
            'correo' => $data['correo'],
            'opinion' => $data['opinion'],
            'valor' => $data['valor'],
            'hora' => $fechaHoraActual,
        ];

        $mongo = new Client();
        $db = $mongo->selectDatabase('Minerva');
        $collection = $db->selectCollection('opiniones5');
        $result = $collection->insertOne($opinion);

        return redirect('/opiniones/Mopiniones')->with('mensaje', 'Opinión creada!');
    }

    public function mostrarOpiniones()
    {
        $mongo = new Client();
        $db = $mongo->selectDatabase('Minerva');
        $collection = $db->selectCollection('opiniones5');

        $opiniones = $collection->find()->toArray();
        
        return view('opiniones.Mopiniones')->with('data', compact('opiniones'));
    }
    
}
