<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])
    ->prefix('contacts')
    ->namespace('Contact')
    ->name('contact.')
    ->group(function () {
        Route::middleware('can:read contacts')->group(function () {
            Route::get('/', 'GetContacts\GetContactsAction')->name('getContacts');
            Route::get('/{contact}', 'Show\ShowContactAction')->name('show');
        });
        Route::middleware('can:edit contacts')->group(function () {
            Route::post('/', 'Create\CreateContactAction')->name('create');
            Route::put('{contact}', 'Update\UpdateContactAction')->name('update');
        });

        Route::delete('/{contact}', 'Delete\DeleteContactAction')
            ->middleware('can:delete contacts')
            ->name('delete');
    });
