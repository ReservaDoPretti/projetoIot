<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensorCreate extends Component
{

    public $ambiente;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;

protected $rules = [
        'ambiente' => 'requireds',
        'codigo' => 'unique:sensors,codigo',
        'tipo' => 'required:sensors,tipo',
        'descricao' => 'required|max:255',
        'status'=> 'required',
    ];

    protected $messages = [
        'codigo.unique' => 'O campo codigo é único.',

        'tipo.required' => 'O campo é obrigatório.',
        'tipo.max' => 'Limite de caracteres excedido.',
      

        'descricao.required' => 'O campo é obrigatório.',
        'descricao.max' => 'Limite de caracteres foi excedido.',
     
        'ambiente.required' => 'O campo é obrigatório.',

        'status.required' => 'O campo é obrigatório',
    ];

    public function store(){


        if($this->ambiente == null){
            session()->flash('error', 'Não foi possivel encontrar o ambiente');
        }

                $this->validate();

            Sensor::create([
            'ambiente_id' => $this->ambiente,
            'codigo' => $this->codigo,  
            'tipo' => $this->tipo,
            'descricao' => $this->descricao,
            'status' => $this->status
        ]);
        
        session()->flash('message', 'Sensor criado com sucesso.');
        return redirect()->route('sensor.list ');
    }


      public function render()
    {
        $ambientes= Ambiente::all();
        return view('livewire.sensor.sensor-create', compact('ambientes'));
    }
}
