<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\Authenticate;
/*
 *
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        if (!auth()->user()->firstName){
            return redirect()->route('step1');
        }
        if (!auth()->user()->lastName){
            return redirect()->route('step2');
        }
        if (!auth()->user()->phone){
            return redirect()->route('step3');
        }
        return redirect()->route('index');
    } else {
        return redirect()->route('signup');
    }
});


Route::get('/register', [RegistrationController::class, 'index'])->name('signup');



Route::middleware(['auth'])->group(function () {
    Route::get('/step1', [RegistrationController::class, 'step_one'])->name('step1');
    Route::get('/step2', [RegistrationController::class, 'step_two'])->name('step2');
    Route::get('/step3', [RegistrationController::class, 'step_three'])->name('step3');
    Route::get('/index', [RegistrationController::class, 'preiviewPage'])->name('index');
});


Route::post('store_register', [RegistrationController::class, 'register'])->name('register');
Route::post('store_step1', [RegistrationController::class, 'storeStepOne'])->name('store_step1');
Route::post('store_step2', [RegistrationController::class, 'storeStepTwo'])->name('store_step2');
Route::post('store_step3', [RegistrationController::class, 'storeStepThree'])->name('store_step3');
