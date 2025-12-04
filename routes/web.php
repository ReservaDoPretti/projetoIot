<?php

use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\AmbienteList;
use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;

use App\Livewire\Registro\RegistroList;

use App\Livewire\Sensor\SensorCreate;
use App\Livewire\Sensor\SensorEdit;
use App\Livewire\Sensor\SensorList;
use Illuminate\Support\Facades\Route;

Route::get('/Dashboard', Dashboard::class)->middleware(['auth', 'user_type:user'])->name('Dashboard');
Route::get('/', Login::class)->name('login');

Route::get('/ambiente/create', AmbienteCreate::class)->middleware(['auth', 'user_type:user'])->name('ambiente.create');
Route::get('/ambiente/list', AmbienteList::class)->middleware(['auth', 'user_type:user'])->name('ambiente.list');
Route::get('/ambiente/{id}/edit', AmbienteEdit::class)->middleware(['auth', 'user_type:user'])->name('ambiente.edit');
Route::get('/registro', RegistroList::class)->middleware(['auth', 'user_type:user'])->name('registro.list');
Route::get('/sensor/create', SensorCreate::class)->middleware(['auth', 'user_type:user'])->name('sensor.create');
Route::get('/sensor/list', SensorList::class)->middleware(['auth', 'user_type:user'])->name('sensor.list');
Route::get('/sensor/{id}/edit', SensorEdit::class)->middleware(['auth', 'user_type:user'])->name('sensor.edit');
