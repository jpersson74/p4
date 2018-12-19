<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\Upload;

class ProjectUploadTableSeeder extends Seeder
{

    public function run()
    {
        $projects = [
            '12P-i55555' => ['UC-E-1-50319383-f80-Rev03_V03.pdf'],
            '18P-i11111' => ['UC-Fp-1-20519084-f100_Rev03.00_V01.pdf', 'UC-Fp-1-50616147-f100_Rev02.00_V02.pdf'],
            '17P-i22222' => ['UC-Fp-1-50616147-f100_Rev02.00_V02.pdf'],
            '09P-i99999' => ['UC-E-1-50319383-f80-Rev03_V03.pdf'],
        ];

        foreach ($projects as $project => $files) {
            $project = Project::where('ProjectID', 'like', $project)->first();

            foreach ($files as $fileName) {
                $file = Upload::where('filename', 'LIKE', $fileName)->first();

                $project->uploads()->save($file);
            }
        }
    }
}
