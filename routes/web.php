<?php

use App\Http\Controllers\DespensesController;
use App\Http\Controllers\invitationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\ColocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/formColocation',function(){
    return view('colocation.formColocation');
})->name('formColocation');

//store colocation 
Route::post('/Colocation',[ColocationController::class,'store'])->name('Colocation.store');
//view de la colocation
Route::get('/colocation', [ColocationController::class, 'view'])->name('colocationView');




//create categories     
Route::get('/colocation/{id}/categories/create',
    [CategoryController::class, 'create']
)->name('categories.create');

// Form creation
Route::get('/colocation/{id}/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');

// Store category
Route::post('/colocation/{id}/categories', [CategoryController::class, 'store'])
    ->name('categories.store');

//despenses
Route::get('/colocation/{id}/despenses/create', [DespensesController::class, 'create'])
    ->name('despenses.create');

Route::post('/colocation/{id}/despenses', 
    [DespensesController::class, 'store'])->name('despenses.store');

//invitation create
Route::get('/colocation/{id}/invitation/create', [InvitationController::class, 'create'])
    ->name('invitation.create');

//form invitation 
Route::post('/colocation/{id}/invitation/store', [InvitationController::class, 'store'])
->name('invitation.store');

Route::get('/invitation/accept/{token}', [InvitationController::class, 'accept'])->name('invitation.accept');
Route::get('/invitation/decline/{token}', [InvitationController::class, 'decline'])->name('invitation.decline');

Route::get('/dashbordMenmber', function () {
    return view('colocation.dashbordMenmber');
})->middleware(['auth'])->name('dashbordMenmber');




require __DIR__.'/auth.php';
