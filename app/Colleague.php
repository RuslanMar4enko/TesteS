<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colleague extends Model
{
    protected $table = 'colleagues';
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'image',
        'sociability',
        'engineering_skill',
        'time_management',
        'lang',
    ];
    public function projects()
    {
        return $this->belongsToMany(Project::class ,'colleague_projects', 'colleague_id', 'project_id');
    }
}
