<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Edgar;
use Illuminate\Support\Facades\Route;
use App\Mail\Correo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos', [Edgar::class, 'index2']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('thor', 
[Edgar::class, 'index']
);

Route::get('/unsubscribe/{user}', function (Request $request) {
    if (! $request->hasValidSignature()) {
        abort(401);
    }

    else{
       
        $longitude =   Str::random(5);
      
       
        //return $key;
        return view('gncode',compact('longitude'));
    }
 
    // ...
})->name('unsubscribe');

//Route::get('event/{id}/{user}/{response}', 
//function ($id, $user, $response) {
   // Url::route('event.confirm', ['id' => 2, 'user' => 34, 'response' => 'yes']);
//})->name('event.confirm');

require __DIR__.'/auth.php';
