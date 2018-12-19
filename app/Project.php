<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public function uploads()
    {
        return $this->belongsToMany('App\Upload', 'project_upload', 'project_id', 'upload_id')->withTimestamps();
    }

}