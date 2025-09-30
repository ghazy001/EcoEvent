<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','goal_amount','status'];

    // casts
    protected $casts = [
        'goal_amount' => 'decimal:2',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class)->orderBy('date','desc');
    }

    // helper: total donated
    public function totalDonations(): float
    {
        return (float) $this->donations()->sum('amount');
    }

    // percent raised (0-100)
    public function percentRaised(): int
    {
        if ($this->goal_amount <= 0) return 0;
        return (int) round(($this->totalDonations() / $this->goal_amount) * 100);
    }
}
