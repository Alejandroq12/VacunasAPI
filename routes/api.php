<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(PopulationController::class)->group(function()
    {
        Route::get('/population/states/{states}','showStates');
        Route::get('/populations', 'index');
        Route::get('/population/{id}', 'show');
        Route::post('/population', 'store');
        Route::put('/population/{id}', 'update');
        Route::delete('/population/{id}', 'destroy');
    }
);


Route::controller(TypeOfVaccineController::class)->group(function()
    {
        Route::get('/vaccines', 'index');
        Route::get('/vaccines/types/{vaccine_name}','showTypeVaccine');
        Route::post('/vaccines', 'store');
        Route::get('/vaccines/{id}', 'show');
        Route::put('/vaccines/{id}', 'update');
        Route::delete('/vaccines/{id}', 'destroy');
    }
);

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});