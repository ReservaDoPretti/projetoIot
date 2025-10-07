<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Models\Registro;
use App\Models\Sensor;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function store (RegistroRequest $request){

        $sensor = Sensor::where('codigo', '=' , $request->codigo)->first();
        if($sensor == null){
            return response()->json([
                'status' =>false,
                'message' => 'não foi possivel encontra o código'
            ]);
        }
        
        $registro = Registro::create([
            'sensor_id' => $sensor->id,
            'valor' => $request->valor,
            'unidade' => $request->unidade,
            'data_hora' => date('Y/m/d H:i:s')
        ]);
            return response()->json([
                'status' => true,
                'message' => 'Registrado com sucesso',
                'data' => $registro
            ]);
    }
}
