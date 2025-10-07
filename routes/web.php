<?php

use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\AmbienteList;
use App\Livewire\Dashboard;

use App\Livewire\Registro\RegistroList;

use App\Livewire\Sensor\SensorCreate;
use App\Livewire\Sensor\SensorEdit;
use App\Livewire\Sensor\SensorList;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class);

Route::get('/ambiente/create', AmbienteCreate::class)->name('ambiente.create');
Route::get('/ambiente/list', AmbienteList::class)->name('ambiente.list');
Route::get('/ambiente/{id}/edit', AmbienteEdit::class)->name('ambiente.edit');
Route::get('/registro', RegistroList::class)->name('registro.list');
Route::get('/sensor/create', SensorCreate::class)->name('sensor.create');
Route::get('/sensor/list', SensorList::class)->name('sensor.list');
Route::get('/sensor/{id}/edit', SensorEdit::class)->name('sensor.edit');
