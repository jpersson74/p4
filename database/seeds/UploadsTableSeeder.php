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
            ['eo_KAS18PA200_1TA5_04222018_MASPMainland_USFt_NAD83(2011)_Epoch2018@90_Geoid12A_AppStd_Final.txt', '/uploads'],
            ['UC-Fp-1-20519084-f100_Rev03.00_V01.pdf', '/uploads'],
            ['WSP 09-3023.055 Control.kml', '/uploads'],
            ['16N-i188720A Control.kml', '/uploads'],
            ['UC-E-1-50319383-f80-Rev03_V03.pdf', '/uploads'],
            ['eo_KAS18PA147_98X2_04052018_MASPMainland_USFt_NAD83(2011)_Epoch2018@90_Geoid12A_AppStd_Final.txt', '/uploads'],



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
