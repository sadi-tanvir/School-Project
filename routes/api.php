<?php

use App\Http\Controllers\Backend\Machine_Attendence\MachineAttendenceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Machine attendence
Route::post('/create-attendance', [MachineAttendenceController::class, 'store']);
Route::get('attendances', [MachineAttendenceController::class, 'index']);
Route::get('attendances/{id}', [MachineAttendenceController::class, 'show']);
Route::post('attendances', [MachineAttendenceController::class, 'store']);
Route::put('attendances/{id}', [MachineAttendenceController::class, 'update']);
Route::delete('attendances/{id}', [MachineAttendenceController::class, 'destroy']);
