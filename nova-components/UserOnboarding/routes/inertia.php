<?php

use Illuminate\Support\Facades\Route;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Tool Routes
|--------------------------------------------------------------------------
|
| Here is where you may register Inertia routes for your tool. These are
| loaded by the ServiceProvider of the tool. The routes are protected
| by your tool's "Authorize" middleware by default. Now - go build!
|
*/

Route::get('/', function (NovaRequest $request) {
    $users = User::all();   
    $columns = [
        'id' => __('ID'),
        'name' => __('Name'),
        'email' => __('Email'),
        'created_at' => __('Created At'),
    ];
    return inertia('UserOnboarding', ['data' => $users,'columns' => $columns]);
});