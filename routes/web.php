<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/loginApi', 'HomeController@loginApi')->name('loginApi');


 Route::group(['middleware' => ['lmts']], function(){
  // rotas para preg
  Route::get('/preg/home', 'PregController@index')->name('preg.home');
  Route::get('/preg/ppc/finalizados','PregController@finalizados')->name('preg.finalizados');
  Route::get('/preg/ppc/ajustes','PregController@ajustes')->name('preg.ajustes');
  Route::get('/preg/acompanharProcesso','PregController@acompanharProcesso')->name('preg.acompanharProcesso');

  // rotas para cpa
  Route::get('/cpa/home', 'CpaController@index')->name('cpa.home');
  Route::get('/cpa/ppc/finalizados','CpaController@finalizados')->name('cpa.finalizados');
  Route::get('/cpa/ppc/ajustes','CpaController@ajustes')->name('cpa.ajustes');
  Route::get('/cpa/acompanharProcesso','CpaController@acompanharProcesso')->name('cpa.acompanharProcesso');

  // rotas para nde
  Route::get('/nde/home','NdeController@index')->name('nde.home');
  Route::get('/nde/reabrirProcesso','NdeController@indexReabrirProcesso')->name('nde.reabrirProcesso');

  // rotas para coordenador
  Route::get('/coordenador/home', 'CoordenadorController@index')->name('coordenador.home');

  // rotas para ppc
  Route::get('/coordenador/ppc/cadastrar', 'PpcController@cadastrar')->name('ppc.cadastrar');
  Route::post('/coordenador/ppc/criar', 'PpcController@criar')->name('ppc.criar');

});
