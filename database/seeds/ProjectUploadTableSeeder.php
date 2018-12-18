<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\Upload;

class ProjectUploadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # First, create an array of all the books we want to associate tags with
        # The *key* will be the book title, and the *value* will be an array of tags.
        # Note: purposefully omitting the Harry Potter books to demonstrate untagged books
        $projects =[
            '12P-i55555' => ['UC-E-1-50319383-f80-Rev03_V03.pdf'],
            '18P-i11111' => ['UC-Fp-1-20519084-f100_Rev03.00_V01.pdf','UC-Fp-1-50616147-f100_Rev02.00_V02.pdf'],
            '17P-i22222' => ['UC-Fp-1-50616147-f100_Rev02.00_V02.pdf'],
            '09P-i99999' => ['UC-E-1-50319383-f80-Rev03_V03.pdf'],
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach ($projects as $project => $files) {

            # First get the book
            $project = Project::where('ProjectID', 'like', $project)->first();

            # Now loop through each tag for this book, adding the pivot
            foreach ($files as $fileName) {
                $file = Upload::where('filename', 'LIKE', $fileName)->first();

                # Connect this tag to this book
                $project->uploads()->save($file);
            }
        }
    }
}
