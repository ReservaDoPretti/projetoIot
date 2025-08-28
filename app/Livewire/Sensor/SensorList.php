<?php

namespace App\Livewire\Sensor;

use App\Models\Sensor;
use Livewire\Component;
use Livewire\WithPagination;

class SensorList extends Component
{

     use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 15;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 15],
    ];  

    

    public function render()
    {
          $sensores = Sensor::where('codigo', 'like', "{$this->search}%")
            ->orWhere('tipo', 'like', "{$this->search}%")
            ->paginate($this->perPage);

        return view('livewire.sensor.sensor-list', compact('sensores'));
        
    }

    public function delete($id)
    {
       
            $sensor = Sensor::findOrFail($id);
            Sensor::findOrfail($sensor->id)->delete();
            session()->flash('message', 'Sensor deletado com sucesso!');
    }

}
