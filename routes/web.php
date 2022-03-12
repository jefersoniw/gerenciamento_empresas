<?php

use App\Http\Controllers\EmpresaController;
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

route::view('/', 'auth.login');

route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

route::middleware('auth')->group(function () {
    route::resource('/empresas', EmpresaController::class);
    route::get('/delete/{id}/empresas', [EmpresaController::class, 'destroy'])->name('empresas.delete');
    route::post('/buscar/empresas', [EmpresaController::class, 'buscar'])->name('empresas.buscar');
    route::get('/excluidas/empresas', [EmpresaController::class, 'excluidos'])->name('empresas.excluidas');
    route::get('/especial/empresas', [EmpresaController::class, 'especial'])->name('empresas.especial');
    route::get('/addespecial/empresa/{id}', [EmpresaController::class, 'addEspecial'])->name('empresas.addespecial');
    route::get('/removeespecial/empresa/{id}', [EmpresaController::class, 'removeEspecial'])->name('empresas.removeespecial');
    route::get('/restore/{id}/empresa', [EmpresaController::class, 'restore'])->name('empresas.restore');
});
