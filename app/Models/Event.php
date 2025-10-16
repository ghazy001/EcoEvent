<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'start_at',
        'end_at',
        'lieu_id',
        'capacity',
    ];

    public function lieu()
    {
        return $this->belongsTo(Lieu::class, 'lieu_id');
    }
}
