<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\IngresoController;

Route::apiResource('V1/ingresos',IngresoController::class);
Route::get('V1/ingresos-24',[IngresoController::class,'horas24']);
