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

Route::get('/debug', function () {
    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: ' . $e->getMessage();
    }

    dump($debug);
});

//Main controller route
Route::get('/', 'ProjectController@index');

//Data controller route
Route::get('/data', 'ProjectController@data');

//Search controller route
Route::get('/search', 'ProjectController@search');

//Post Route for data entry
Route::post('/enter-data', 'ProjectController@enterData');

//Route for project search
Route::get('/search-process', 'ProjectController@searchProcess');

# EDIT
# Show the form to edit a specific book
Route::get('/{id}/edit', 'ProjectController@edit');
# Process the form to edit a specific book
Route::put('/update/{id}', 'ProjectController@update');

# DELETE
# Show the page to confirm deletion of a book
Route::get('/{id}/delete', 'ProjectController@delete');
# Process the deletion of a book
Route::delete('/destroy/{id}', 'ProjectController@destroy');

