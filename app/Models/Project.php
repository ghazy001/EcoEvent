<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title','slug','description','status','progress','start_date','end_date'
    ];

    protected $casts = [
        'progress' => 'integer',
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

