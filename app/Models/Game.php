<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = "games";

    public function developer()
    {
        return $this->belongsTo(Developer::class);
        return $this->belongsTo('App\Models\Developer', 'developer_id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

}
