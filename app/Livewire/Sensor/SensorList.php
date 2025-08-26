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
          $ambientes = Sensor::where('codigo', 'like', "{$this->search}%")
            ->orWhere('ambiente_id', 'like', "{$this->search}%")
            ->paginate($this->perPage);

        return view('livewire.ambiente.ambiente-list', compact('sensores'));
    }

}
