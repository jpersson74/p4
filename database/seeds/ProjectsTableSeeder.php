<?php

use Illuminate\Database\Seeder;
use App\Project;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            ['18P-i11111', '2018', 'Photogrammetry', 'Worcester', 'MA'],
            ['17P-i22222', '2017', 'GIS', 'Boston', 'MA'],
            ['16P-i66666', '2016', 'Laser Scanning', 'Providence', 'RI'],
            ['12P-i55555', '2012', 'Survey', 'Portland', 'ME'],
            ['09P-i99999', '2009', 'GIS', 'Burlington', 'VT'],
            ['04P-i44444', '2004', 'Photogrammetry', 'New York', 'NY'],


];

        $count = count($projects);

        foreach ($projects as $key => $projectData) {
            $project = new Project();

            $project->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $project->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $project->projectID = $projectData[0];
            $project->Year = $projectData[1];
            $project->projectType = $projectData[2];
            $project->City = $projectData[3];
            $project->State = $projectData[4];

            $project->save();
            $count--;
        }
    }
}
