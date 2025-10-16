<?php
namespace App\Http\Controllers;
use App\Models\Cause;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    // store donation for a cause (route model binding)
    public function store(Request $request, Cause $cause)
    {
        $data = $request->validate([
            'donor_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $cause->donations()->create([
            'donor_name' => $data['donor_name'],
            'amount' => $data['amount'],
            'date' => now()->toDateString(),
        ]);

        return redirect()->route('causes.show', $cause)
            ->with('success','Thank you! Your donation was recorded.');
    }
}
