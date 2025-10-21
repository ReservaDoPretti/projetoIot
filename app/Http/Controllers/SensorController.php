<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
   public function find(Request $request)
{
    $sensor = Sensor::where('codigo', '=', $request->codigo)->first();

    if ($sensor == null) {
        return response()->json([
            'status' => false,
            'message' => 'Não foi possível encontrar o código do sensor'
        ], 404);
    }

    return response()->json([
        'status' => true,
        'message' => 'Código do sensor encontrado com sucesso',
        'estado' => (bool) $sensor->status 
    ]);
}

    public function update(Request $request)
    {
        $sensor = Sensor::where('codigo', '=', $request->codigo)->first();
        if ($sensor == null) {
            return response()->json([
                'status' => false,
                'message' => 'Não foi possivel encontra o codigo do sensor'
            ]);
        }

        $sensor->update(['status' => $request->status]);

        return response()->json([
            'message' => 'Codigo do sensor atualizado com sucesso',
            'status' => true
        ]);
    }

   
}
