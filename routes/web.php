<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

// Route::resource('contacts', 'ContactController');
Route::resource('todos', 'TodosController');


Route::get('image-upload', [ TodosController::class, 'imageUpload' ])->name('image.upload');
Route::post('image-upload', [ TodosController::class, 'imageUploadPost' ])->name('image.upload.post');

// Route::prefix('exams')->group(function () {
//     Route::resource('/', 'ExamsController'); //not sure why update and destroy are not working
//     Route::patch('/{id}', 'ExamsController@update');
//     Route::delete('/{id}', 'ExamsController@destroy');
//     Route::get('/get-index', 'ExamsController@get_index');
// });


Route::get('/public/images/{filename}', function($filename){
    $path = resource_path() . '/app/uploads/' . $filename;

    if(!File::exists($path)) {
        return response()->json(['message' => 'Image not found.'], 404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});



Route::get('todos', 'TodosController@index');
Route::get('todos/{todo}', 'TodosController@show');
Route::post('todos', 'TodosController@store');
Route::put('todos/{todo}', 'TodosController@update');
Route::delete('todos/{todo}', 'TodosController@delete');


Route::get('soap/test', function (){
    // $url = "";

    // $client = new SoapClient('http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL');
    $client = new SoapClient('http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL');
    dd($client->__getTypes());
    dd($client->CountryName (['sCountryISOCode' => 'AF']));
    
});

// Route::get('projects', 'ProjectController@index');
// Route::get('projects/{project}', 'ProjectController@show');
// Route::post('projects', 'ProjectController@store');
// Route::put('projects/{project}', 'ProjectController@update');
// Route::delete('projects/{project}', 'ProjectController@delete');

