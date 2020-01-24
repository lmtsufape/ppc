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
    return redirect()->route('login');
});

Auth::routes();

Route::get( '/home',                                 'HomeController@index'                 )->name('home');
Route::post('/loginApi',                             'HomeController@loginApi'              )->name('loginApi');
Route::get( '/login',                                'HomeController@irParaLogin'           )->name('login');

 Route::group(['middleware' => ['lmts']], function(){
  // rotas para preg
  Route::get('/preg/home',                           'PregController@index'                 )->name('preg.home');
  Route::get('/preg/ppc/verFinalizados',             'PregController@finalizados'           )->name('preg.finalizados');
  Route::get('/preg/ppc/verAbertos',                 'PregController@ajustes'               )->name('preg.ajustes');
  Route::get('/preg/acompanharProcesso',             'PregController@acompanharProcesso'    )->name('preg.acompanharProcesso');

  // rotas para cpga
  Route::get( '/cpga/home',                          'CpgaController@index'                 )->name('cpga.home');
  Route::get( '/cpga/ppc/verFinalizados',            'CpgaController@finalizados'           )->name('cpga.finalizados');
  Route::get( '/cpga/ppc/verAbertos',                'CpgaController@ajustes'               )->name('cpga.ajustes');
  Route::get( '/cpga/acompanharProcesso',            'CpgaController@acompanharProcesso'    )->name('cpga.acompanharProcesso');
  Route::post('/cpga/novoParecer',                   'CpgaController@novoParecer'           )->name('cpga.novoParecer');
  Route::post('/cpga/modificarArquivo',              'CpgaController@modificarArquivo'      )->name('cpga.modificarArquivo');

  // rotas para capr
  Route::get( '/capr/home',                          'CaprController@index'                 )->name('capr.home');
  Route::get( '/capr/ppc/verFinalizados',            'CaprController@finalizados'           )->name('capr.finalizados');
  Route::get( '/capr/ppc/verAbertos',                'CaprController@ajustes'               )->name('capr.ajustes');
  Route::get( '/capr/acompanharProcesso',            'CaprController@acompanharProcesso'    )->name('capr.acompanharProcesso');
  Route::post('/capr/novoParecer',                   'CaprController@novoParecer'           )->name('capr.novoParecer');
  Route::post('/capr/modificarArquivo',              'CaprController@modificarArquivo'      )->name('capr.modificarArquivo');

  // rotas para cge
  Route::get( '/cge/home',                           'CgeController@index'                  )->name('cge.home');
  Route::get( '/cge/ppc/verFinalizados',             'CgeController@finalizados'            )->name('cge.finalizados');
  Route::get( '/cge/ppc/verAbertos',                 'CgeController@ajustes'                )->name('cge.ajustes');
  Route::get( '/cge/acompanharProcesso',             'CgeController@acompanharProcesso'     )->name('cge.acompanharProcesso');
  Route::post('/cge/novoParecer',                    'CgeController@novoParecer'            )->name('cge.novoParecer');
  Route::post('/cge/modificarArquivo',               'CgeController@modificarArquivo'       )->name('cge.modificarArquivo');

  // rotas para dep
  Route::get('/dep/home',                            'DepPregController@index'              )->name('dep.home');
  Route::get('/dep/ppc/finalizados',                 'DepPregController@finalizados'        )->name('dep.finalizados');
  Route::get('/dep/ppc/ajustes',                     'DepPregController@ajustes'            )->name('dep.ajustes');
  Route::get('/dep/acompanharProcesso',              'DepPregController@acompanharProcesso' )->name('dep.acompanharProcesso');

  // rotas para nde
  // Route::get('/nde/home',                         'NdeController@index'                  )->name('nde.home');

  // rotas para coordenador
  Route::get('/coordenador/home',                    'CoordenadorController@index'          )->name('coordenador.home');
  Route::get('/coordenador/verAbertos',              'CoordenadorController@verAbertos'     )->name('coordenador.verAbertos');
  Route::get('/coordenador/verFinalizados',          'CoordenadorController@verFinalizados' )->name('coordenador.verFinalizados');
  Route::get('/coordenador/acompanhar',              'CoordenadorController@acompanhar'     )->name('coordenador.acompanhar');
  Route::get('/coordenador/retomar',                 'CoordenadorController@retomar'        )->name('coordenador.retomar');
  Route::post('/coordenador/novaVersao',             'CoordenadorController@novaVersao'     )->name('coordenador.novaVersao');

  // rotas para ppc
  Route::get('/coordenador/ppc/cadastrar',           'PpcController@cadastrar'              )->name('ppc.cadastrar');
  Route::post('/coordenador/ppc/criar',              'PpcController@criar'                  )->name('ppc.criar');
  Route::get('/coordenador/ppc/reabrir',             'PpcController@indexReabrirPpc'        )->name('ppc.reabrir');

  // rota downloadArquivo
  Route::get('/downloadArquivo',                     'HomeController@downloadArquivo'       )->name('download');


});
