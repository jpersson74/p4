<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public function uploads()
    {
        # withTimestamps will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Upload','project_upload', 'project_id', 'upload_id')->withTimestamps();

    }

}