<?php

use App\Http\Controllers\ReportDiarioController;
use App\Http\Livewire\Diario\DiarioController;
use App\Http\Livewire\Home\Home;
use App\Http\Livewire\Laboratorio\LaboratorioController;
use App\Http\Livewire\Linea\LineaController;
use App\Http\Livewire\Personal\PersonalController;
use App\Http\Livewire\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', Home::class)->name('home');
Route::get('/user', UserController::class)->name('user');
Route::get('/laboratorio', LaboratorioController::class)->name('laboratorio');
Route::get('/linea', LineaController::class)->name('linea');
Route::get('/personal', PersonalController::class)->name('personal');
Route::get('/diario', DiarioController::class)->name('diario');

//REPORTES
Route::get('/diario/pdf/informe/{f1}', [ReportDiarioController::class, 'reportPDF']);