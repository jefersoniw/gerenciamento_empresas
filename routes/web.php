<?php

use App\Http\Controllers\BairroController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\ImagemDocumentoController;
use App\Http\Controllers\LogradouroController;
use App\Http\Controllers\TipoDocumentoController;
use App\Models\Logradouro;
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
    //EMPRESAS
    route::resource('/empresas', EmpresaController::class);
    route::get('/delete/{id}/empresas', [EmpresaController::class, 'destroy'])->name('empresas.delete');
    route::post('/buscar/empresas', [EmpresaController::class, 'buscar'])->name('empresas.buscar');
    route::get('/excluidas/empresas', [EmpresaController::class, 'excluidos'])->name('empresas.excluidas');
    route::get('/especial/empresas', [EmpresaController::class, 'especial'])->name('empresas.especial');
    route::get('/addespecial/empresa/{id}', [EmpresaController::class, 'addEspecial'])->name('empresas.addespecial');
    route::get('/removeespecial/empresa/{id}', [EmpresaController::class, 'removeEspecial'])->name('empresas.removeespecial');
    route::get('/restore/{id}/empresa', [EmpresaController::class, 'restore'])->name('empresas.restore');

    //LOGRADOURO
    route::resource('/logradouros', LogradouroController::class);
    route::get('/logradouro/{id}/delete', [LogradouroController::class, 'destroy'])->name('logradouro.delete');
    route::post('buscar/logradouro', [LogradouroController::class, 'buscar'])->name('logradouro.buscar');

    //BAIRRO
    route::resource('/bairros', BairroController::class);
    route::get('/bairros/{id}/delete', [BairroController::class, 'destroy'])->name('bairros.delete');

    //TIPO DE DOCUMENTOS
    route::resource('/tiposdocumentos', TipoDocumentoController::class);
    route::get('/tiposdocumentos/{id}/delete', [TipoDocumentoController::class, 'destroy'])->name('tiposdocumentos.delete');
});

route::group(['prefix' => 'enderecos', 'middleware' => 'auth'], function () {
    //ENDERECO
    route::get('/{end_id_emp}/index', [EnderecoController::class, 'index'])->name('enderecos.index');
    route::get('/{end_id_emp}/create', [EnderecoController::class, 'create'])->name('enderecos.create');
    route::post('/store', [EnderecoController::class, 'store'])->name('enderecos.store');
    route::get('/{id}/delete/{end_id_emp}', [EnderecoController::class, 'destroy'])->name('enderecos.delete');
    route::get('/{id}/edit', [EnderecoController::class, 'edit'])->name('endereco.edit');
    route::put('/{id}', [EnderecoController::class, 'update'])->name('endereco.update');
});

route::group(['prefix' => 'documentos', 'middleware' => 'auth'], function () {
    //DOCUMENTOS
    route::get('/{doc_id_emp}/index', [DocumentoController::class, 'index'])->name('documentos.index');
    route::get('/{doc_id_emp}/create', [DocumentoController::class, 'create'])->name('documentos.create');
    route::post('/store', [DocumentoController::class, 'store'])->name('documentos.store');
    route::get('/{id}/delete/{doc_id_emp}', [DocumentoController::class, 'destroy'])->name('documentos.delete');
    route::get('/{id}/edit', [DocumentoController::class, 'edit'])->name('documentos.edit');
    route::put('/{id}', [DocumentoController::class, 'update'])->name('documentos.update');
});

route::group(['prefix' => 'imagens', 'middleware' => 'auth'], function () {
    //IMAGENS
    route::get('/{imd_id_doc}/index', [ImagemDocumentoController::class, 'index'])->name('imagemdocumento.index');
    route::get('/{imd_id_doc}/create', [ImagemDocumentoController::class, 'create'])->name('imagemdocumento.create');
    route::post('/store', [ImagemDocumentoController::class, 'store'])->name('imagemdocumento.store');
    route::get('/{id}/delete/{imd_id_doc}', [ImagemDocumentoController::class, 'destroy'])->name('imagemdocumento.delete');
    route::get('/{id}/edit', [ImagemDocumentoController::class, 'edit'])->name('imagemdocumento.edit');
    route::put('/{id}', [ImagemDocumentoController::class, 'update'])->name('imagemdocumento.update');
});
