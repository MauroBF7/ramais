<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\DivisaController;
use App\Mail\TrocaTelMsg;
use App\Mail\MyTestEmail;
use Illuminate\Support\Facades\Mail;

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

//Route::get('/', function () {
//    return view([TelefoneController::class, 'index'])->name('home');
//});

    //Mail::to('ati.prip@usp.br')->send(new TrocaTelMsg());
    //return 'E-mail enviado com sucesso';
//});
Route::get('/telefones/testroute',function(){
    $name= "Aplicativo Ramais PRIP";
    Mail::to("ati.prip@usp.br")->send(new MyTestEmail($name));
});
//Route::get('/telefones/testao', [TelefoneController::class, 'testao'])->name('telefones.testao');
Route::get('/telefones/exportacao', [TelefoneController::class, 'exportacao'])->name('telefones.exportacao');
Route::get('/', [TelefoneController::class, 'index'])->name('home');
//Route::get('/telefones/create', [TelefoneController::class, 'create'])->name('telefone.create');
//Route::get('/divisas/create', [DivisaController::class, 'create'])->name('divisa.created');
Route::post('/enderecos/storeModal',[EnderecoController::class,'storeModal'])->name('endereco.storeModal');
Route::resource('enderecos',EnderecoController::class);
Route::resource('divisas',DivisaController::class);

Route::get('/telefones/{telefone}/envio-email',[TelefoneController::class,'troca'])->name('telefone.troca');
Route::post('/telefones/envio/{telefone}',[TelefoneController::class,'envio'])->name('telefones.envio');
Route::resource('telefones',TelefoneController::class);

// Permite usar Gate::check('user')na view 404
Route::fallback(function(){
    return view('errors.404');
 });

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home1');
