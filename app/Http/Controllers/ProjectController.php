<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
//Main controller

    public function index()
    {
        return view('project.index');
    }

    public function data(Request $request)
    {
        return view('project.data');
    }

    public function search(Request $request)
    {
        return view('project.search')->with([
            'projSearch' => $request->session()->get('projSearch', ''),

            'searchResults' => $request->session()->get('searchResults', []),
        ]);
    }

//Search controller

    public function searchProcess(Request $request)

    {
        $projSearch = $request->input('projSearch', null);

//Validates the search term with a RegEx

        $request->validate([

            'projSearch' => 'required'
        ]);

//If there is a search term the following executes

        if ($projSearch) {
//Gets existing data from Project model

            $projects = Project::Where('ProjectID', 'LIKE', '%' . $projSearch . '%')
                ->orWhere('Year', '=', "$projSearch")
                ->orWhere('ProjectType', '=', "$projSearch")
                ->orWhere('City', '=', "$projSearch")
                ->orWhere('State', '=', "$projSearch")
                ->get();

            return view('project.search')->with([
                'projects' => $projects,
                'projSearch' => $projSearch,

            ]);
        }
    }

//Data entry controller

    public function enterData(Request $request)

    {
//Validates the form fields

        $request->validate([

            'projID' => 'regex:/^\d{2}[P]-.*$/',
            'projYear' => 'required',
            'projType' => 'required',
            'projCity' => 'required',
            'projState' => 'required'
        ]);

//Writes to database

        $project = new Project();
        $project->ProjectID = $request->input('projID');
        $project->Year = $request->input('projYear');
        $project->ProjectType = $request->input('projType');
        $project->City = $request->input('projCity');
        $project->State = $request->input('projState');
        $project->save();

        $files =[];
        if ($request->file('abgps')) $files[] = $request->file('abgps');
        if ($request->file('kml')) $files[] = $request->file('kml');
        if ($request->file('calibration')) $files[] = $request->file('calibration');
        foreach ($files as $file)
        {
            if(!empty($file)){
                $destinationPath = public_path() . '/uploads';
                $filename = $file->getClientOriginalName();
                $file->move($destinationPath, $filename);
            }

        }

//Writes success message back to page

        return redirect()->back()->with('success', 'Project ' . $project->ProjectID . ' was added.');
    }

    /*
* GET /books/{id}/edit
*/
    public function edit($id)
    {
        $project = Project::find($id);

        return view('project.edit')->with([
            'project' => $project,

        ]);
    }

    /*
    * PUT /books/{id}
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'projID' => 'regex:/^\d{2}[P]-.*$/',
            'projYear' => 'required',
            'projType' => 'required',
            'projCity' => 'required',
            'projState' => 'required'
        ]);
        $project = Project::find($id);
        $project->ProjectID = $request->projID;
        $project->Year = $request->projYear;
        $project->ProjectType = $request->projType;
        $project->City = $request->projCity;
        $project->State = $request->projState;
        $project->save();

        return redirect()->back()->with('success', 'Your changes have been saved!');
    }

    public function delete($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect('/search')->with('alert', 'Project not found');
        }

        return view('project.delete')->with([
            'project' => $project,
        ]);
    }

    /*
    * Actually deletes the book
    * DELETE /books/{id}/delete
    */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect()->back()->with('success', 'Project' . $project->ProjectID . 'was deleted');

    }




}