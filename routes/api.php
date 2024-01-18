<?php

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\TodoResource;

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



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Auth::routes();
// Route::apiResource('todos', TodosController::class)->middleware('auth:api');
// Route::get('todos', function() {
//     // If the Content-Type and Accept headers are set to 'application/json', 
//     // this will return a JSON structure. This will be cleaned up later.
//     return Todo::all();
// });
 
// Route::get('todos/{id}', function($id) {
//     return Todo::find($id);
// });

// Route::post('todos', function(ValidationRequest $request) {
//     return Todo::create($request->all);
// });

// Route::put('todos/{id}', function(ValidationRequest $request, $id) {
  
//     $todo = Todo::findOrFail($id);
    
//     $todo->update($request->all());

//     return $todo;
// });

// Route::delete('todos/{id}', function($id) {
//     Todo::find($id)->delete();

//     return 204;
// });

Route::get('todos', 'TodosController@index');
Route::get('todos/{todo}', 'TodosController@show');
Route::post('todos', 'TodosController@store');
Route::post('todos/{todo}', 'TodosController@update');
Route::delete('todos/{todo}', 'TodosController@delete');


Route::get('soap', 'SoapController@getCountry');
// Route::get('soap', 'SoapController@getCountry');



// Route::post('register', [AuthController::class, 'register']);
// Route::post('login', [AuthController::class, 'login']);

// Route::apiResource('projects', ProjectController::class)->middleware('auth:api');