<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sections\SectionController ;
use App\Http\Controllers\levels\LevelController ;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['guest'] ] , function () {

Route::get('/', function () {
    return view('auth.login');
});


});


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([

'prefix' => LaravelLocalization::setlocale() ,
'middleware' => ['localeSessionRedirect' , 'localizationRedirect' , 'localeViewPath']

], function (){


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::resource('sections' , SectionController::class) ;

Route::resource('levels' , LevelController::class) ;
Route::post('levelsDestroyAll' , [LevelController::class, 'destroyAll']) ;
Route::post('Filter_Classes', [LevelController::class, 'levelsFilter'])->name('Filter_Classes');




});


require __DIR__.'/auth.php';
