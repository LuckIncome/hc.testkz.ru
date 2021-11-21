<?php

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
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::post('analyzes/import', [\App\Http\Controllers\Voyager\VoyagerBaseController::class,'importAnalyses'])->name('analyzes.import');
    Route::post('services/import', [\App\Http\Controllers\Voyager\VoyagerBaseController::class,'importServices'])->name('services.import');

});

Route::get('/cart',[\App\Http\Controllers\CartController::class,'index'])->name('cart.index');
Route::get('/cart/print',[\App\Http\Controllers\CartController::class,'printPdf'])->name('cart.printPdf');
Route::post('/cart/update',[\App\Http\Controllers\CartController::class,'update'])->name('cart.update');
Route::post('/cart/remove',[\App\Http\Controllers\CartController::class,'remove'])->name('cart.remove');
Route::post('/cart/clear',[\App\Http\Controllers\CartController::class,'clear'])->name('cart.clear');
Route::get('/cart/getContent',[\App\Http\Controllers\CartController::class,'getContent'])->name('cart.getContent');

Route::get('/locale/{lang}',[\App\Http\Controllers\PagesController::class,'setLocale'])->name('locale.set');
Route::post('/feedback', [\App\Http\Controllers\PagesController::class,'feedback'])->name('feedback');
Route::post('/feedback/inline', [\App\Http\Controllers\PagesController::class,'feedbackInline'])->name('feedback.inline');
Route::post('/subscribe', [\App\Http\Controllers\PagesController::class,'subscribe'])->name('subscribe');

Route::get('/analizy',[\App\Http\Controllers\AnalyzesController::class,'index'])->name('analyzes.index');
Route::get('/analizy/{research}',[\App\Http\Controllers\AnalyzesController::class,'getResearchPage'])->name('analyzes.research');

Route::get('/uslugi/{service?}',[\App\Http\Controllers\ServicesController::class,'getServiceTypePage'])->name('services.type');

Route::get('/vrachi',[\App\Http\Controllers\DoctorsController::class,'index'])->name('doctors.index');
Route::get('/specs',[\App\Http\Controllers\DoctorsController::class,'specList'])->name('doctors.specList');
Route::get('/vrachi/s/{speciality}',[\App\Http\Controllers\DoctorsController::class,'getSpecialityPage'])->name('doctors.spec');
Route::get('/vrachi/d/{doctor}',[\App\Http\Controllers\DoctorsController::class,'getDoctorsPage'])->name('doctors.show');
Route::get('/akcii', [\App\Http\Controllers\SalesController::class,'index'])->name('sales.index');
Route::get('/akcii/month', [\App\Http\Controllers\SalesController::class,'getSaleMonth'])->name('sales.month');
Route::get('/akcii/{sale}', [\App\Http\Controllers\SalesController::class,'show'])->name('sales.show');
Route::get('/{corp}/{post}',[\App\Http\Controllers\PagesController::class,'getCorporatePost'])->name('corporate.post')->where('corp', \App\Models\Page::where('type','corporate')->first()->slug);

Route::get('/{page?}',[\App\Http\Controllers\PagesController::class,'getPage'])->name('pages.get');


