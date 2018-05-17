<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'name',
    ];


    public function colleagues()
    {
        return $this->belongsToMany(Colleague::class);
    }
}
