<?php

use Illuminate\Database\Seeder;
use App\Upload;

class UploadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = [
            ['UC-E-1-50319383-f80-Rev03_V03.pdf', '/public/uploads'],
            ['UC-Fp-1-20519084-f100_Rev03.00_V01.pdf', '/public/uploads'],
            ['UC-Fp-1-50616147-f100_Rev02.00_V02.pdf', '/public/uploads'],
            ['UC-Fp-1-50811038-f100-Rev01-V01_short.pdf', '/public/uploads']




        ];

        $count = count($files);

        foreach ($files as $key => $fileData) {
            $file = new Upload();

            $file->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $file->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $file->filename= $fileData[0];
            $file->path= $fileData[1];
            $file->save();
            $count--;
        }
    }
}
