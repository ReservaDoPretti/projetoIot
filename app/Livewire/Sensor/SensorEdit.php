<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensorEdit extends Component
{

    public $ambiente;
    public $sensorId;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;

    protected $rules = [
        'tipo' => 'max:255',
        'descricao' => 'max:255',
    ];

    protected $messages = [
      
        'tipo.max' => 'Limite de caracteres excedido.',
        'descricao.max' => 'Limite de caracteres excedido.',

    ];

    public function mount($id)
    {

        $sensor = Sensor::find($id);
        
        if ($sensor == null) {
            session()->flash('error', 'Sensor não encontrado');
            return redirect()->route('sensor.list');
        }
            $this->sensorId = $sensor->id;
            $this->ambiente = $sensor->ambiente_id;
            $this->codigo = $sensor->codigo;
            $this->tipo = $sensor->tipo;
            $this->descricao = $sensor->descricao;
            $this->status = $sensor->status;
        
    }


    public function update()
    {
       

        $sensor = Sensor::find($this->sensorId);

        $sensor->update([
            $sensor -> ambiente_id = $this->ambiente,
            $sensor -> descricao = $this->descricao,
            $sensor -> tipo = $this->tipo,
            $sensor -> codigo = $this ->codigo,
            $sensor -> status = $this->status
        ]);


        session()->flash('message', 'Sensor atualizado com sucesso.');
        return redirect()->route('sensor.list');
    }

    public function render()
    {
        $ambientes = Ambiente::all();
        return view('livewire.sensor.sensor-edit' , compact('ambientes'));
    }
}
