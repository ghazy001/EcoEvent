<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cause;
use Illuminate\Http\Request;

class CauseController extends Controller
{
    public function index()
    {
        $causes = Cause::paginate(10);
        return view('admin.causes.index', compact('causes'));
    }

    public function create()
    {
        return view('admin.causes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'goal_amount' => 'required|numeric|min:0',
            'status' => 'required|in:active,completed,canceled',
        ]);

        Cause::create($data);

        return redirect()->route('admin.causes.index')->with('success','Cause created.');
    }

    public function edit(Cause $cause)
    {
        return view('admin.causes.edit', compact('cause'));
    }

    public function update(Request $request, Cause $cause)
    {
        $data = $request->validate([
            'title' => 'required',
            'goal_amount' => 'required|numeric|min:0',
            'status' => 'required|in:active,completed,canceled',
        ]);

        $cause->update($data);

        return redirect()->route('admin.causes.index')->with('success','Cause updated.');
    }

    public function destroy(Cause $cause)
    {
        $cause->delete();
        return redirect()->route('admin.causes.index')->with('success','Cause deleted.');
    }
}
