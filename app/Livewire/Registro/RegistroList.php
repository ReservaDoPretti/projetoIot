<?php

namespace App\Livewire\Registro;

use App\Models\Registro;
use Livewire\Component;
use Livewire\WithPagination;

class RegistroList extends Component
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
        $registros = Registro::where('sensor_id', 'like', "{$this->search}%")
        ->orWhere('unidade', 'like', "($this->search)%")
        ->orderByDesc('id', 'sensor_id', 'unidade', 'valor', 'data_hora')
        ->paginate($this->perPage);
        return view('livewire.registro.registro-list', compact('registros'));
    }

    public function delete($id){

        $registro = Registro::findOrFail($id);
        Registro::findOrFail($registro->$id)->delete();
        session()->flash('message', 'registro deletado com sucesso');
    }
}
