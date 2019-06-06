<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

}
