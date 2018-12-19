<?php

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

# Show the form to edit a specific book
Route::get('/{id}/edit', 'ProjectController@edit');
# Process the form to edit a specific book
Route::put('/update/{id}', 'ProjectController@update');

# Show the page to confirm deletion of a book
Route::get('/{id}/delete', 'ProjectController@delete');
# Process the deletion of a book
Route::delete('/destroy/{id}', 'ProjectController@destroy');

