<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

// Route::get('/', function (Request $request) {
//     //
// });


Route::get('/steps', function () {
    $steps =  [
        'Texto para el primer paso',
        'Texto para el segundo paso',
        'Texto para el tercer paso',
    ];
 
    return response()->json($steps);
});