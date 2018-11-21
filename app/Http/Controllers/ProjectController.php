<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
//Main controller

    public function index(Request $request)
    {
        return view('project.index')->with([
            'projSearch' => $request->session()->get('projSearch', ''),

            'searchResults' => $request->session()->get('searchResults', []),
        ]);
    }

//Search controller

    public function searchProcess(Request $request)

    {
        $searchResults = [];

        $projSearch = $request->input('projSearch', null);

//Validates the search term with a RegEx

        $request->validate([

            'projSearch' => 'regex:/^\d{2}[P]-.*$/'
        ]);

//If there is a search term the following executes

        if ($projSearch) {

//Gets existing data from JSON

            $projectsJSON = file_get_contents(database_path('/projects.json'));

            $data = json_decode($projectsJSON, true);

//Loops through array to search for data

            foreach ($data as $projectID => $project) {
                if ($project['ProjectID'] == $projSearch) {
                    $searchResults[$projectID] = $project;
                }
            }
        }

//Returns requested data back to page

        return redirect('/')->with([
            'projSearch' => $projSearch,

            'searchResults' => $searchResults
        ]);
    }

//Data entry controller

    public function enterData(Request $request)
    {

//Validates the form fields

        $request->validate([

            'projID' => 'regex:/^\d{2}[P]-.*$/',
            'projYear' => 'required',
            'projType' => 'required',
            'projLoc' => 'required'
        ]);

//Creates the data array from filled in fields after verification

        $data = [

            'ProjectID' => $request['projID'],
            'Year' => $request['projYear'],
            'ProjectType' => $request['projType'],
            'Location' => $request['projLoc']
        ];

//Gets any existing JSON data from file

        $dataToJSON = file_get_contents(database_path('/projects.json'));

//Decodes JSON into array

        $dataArr = json_decode($dataToJSON, true);

//Writes to array

        $dataArr[] = $data;

//Writes to JSON

        $json = json_encode($dataArr, JSON_PRETTY_PRINT);

//Adds new data to JSON file

        file_put_contents(database_path('/projects.json'), $json);

//Writes success message back to page

        return redirect()->back()->with('success', 'Thanks for submitting!');
    }

}