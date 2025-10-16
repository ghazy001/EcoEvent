<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $fillable = [
        'title','description','start_at','end_at','lieu_id','capacity','status'
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at'   => 'datetime',
    ];

    public function lieu() {
        return $this->belongsTo(Lieu::class, 'lieu_id');
    }

    public function materials() {
        return $this->belongsToMany(Material::class)
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
