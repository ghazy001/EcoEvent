<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Cause extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','goal_amount','status','image_path'];

    protected $casts = [
        'goal_amount' => 'decimal:2',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class)->orderBy('date','desc');
    }

    public function totalDonations(): float
    {
        return (float) $this->donations()->sum('amount');
    }

    public function percentRaised(): int
    {
        if ($this->goal_amount <= 0) return 0;
        return (int) round(($this->totalDonations() / $this->goal_amount) * 100);
    }

    // remove file from disk when the model is deleted
    protected static function booted()
    {
        static::deleting(function (Cause $cause) {
            if ($cause->image_path && Storage::disk('public')->exists($cause->image_path)) {
                Storage::disk('public')->delete($cause->image_path);
            }
        });
    }
}
