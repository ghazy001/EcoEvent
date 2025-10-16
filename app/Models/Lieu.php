<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lieu extends Model
{

    use HasFactory, SoftDeletes;

    // On force le nom de table français pour éviter la pluralisation anglaise "lieus"
    protected $table = 'lieux';

    protected $fillable = [
        'name',
        'address',
        'capacity',
        'description',
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'lieu_id');
    }
}
