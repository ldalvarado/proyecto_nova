<?php

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

Route::get('/onboarding', function () {
    return [
        'steps' => [
            [
                'target' => '.user-row:first-child',
                'content' => 'Bienvenido a la pantalla de usuarios. Aquí puedes ver la lista de usuarios registrados.',
            ],
            [
                'target' => '.user-row:first-child',
                'content' => 'Este es el primer registro de la lista de usuarios.',
            ],
            [
                'target' => '.page-header__actions button:first-child',
                'content' => 'Para crear un nuevo usuario, haz clic en el botón "crear usuario".',
            ],
        ],
    ];
});
