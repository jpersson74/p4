<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{

    public function projects()
    {
        return $this->belongsToMany('App\Project','project_upload', 'project_id', 'upload_id')->withTimestamps();
    }




}