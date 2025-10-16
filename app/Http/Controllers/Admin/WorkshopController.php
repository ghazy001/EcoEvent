<?php
// app/Http/Controllers/Admin/WorkshopController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Lieu;
use App\Models\Material;

class WorkshopController extends Controller
{
    public function index()
    {
        $workshops = Workshop::with(['lieu','materials'])->latest()->paginate(10);
        return view('admin.workshops.index', compact('workshops'));
    }

    public function create()
    {
        $lieux = Lieu::orderBy('name')->get();
        $materials = Material::orderBy('name')->get();
        return view('admin.workshops.create', compact('lieux','materials'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'start_at'     => 'nullable|date',
            'end_at'       => 'nullable|date|after_or_equal:start_at',
            'lieu_id'      => 'nullable|exists:lieux,id',
            'capacity'     => 'nullable|integer|min:0',
            'status'       => 'required|in:draft,published',
            'material_ids'   => 'array',
            'material_ids.*' => 'exists:materials,id',
            'quantities'     => 'array',
            'quantities.*'   => 'nullable|integer|min:1',
        ]);

        $workshop = Workshop::create($data);

        // sync pivot quantities
        $sync = [];
        foreach (($request->input('material_ids', []) ?? []) as $mid) {
            $q = (int)($request->input("quantities.$mid") ?? 1);
            $sync[$mid] = ['quantity' => max(1, $q)];
        }
        $workshop->materials()->sync($sync);

        return redirect()->route('admin.workshops.index')->with('success','Workshop créé.');
    }

    public function edit(Workshop $workshop)
    {
        $lieux = Lieu::orderBy('name')->get();
        $materials = Material::orderBy('name')->get();
        $current = $workshop->materials->pluck('pivot.quantity','id'); // id => qty
        return view('admin.workshops.edit', compact('workshop','lieux','materials','current'));
    }

    public function update(Request $request, Workshop $workshop)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'start_at'     => 'nullable|date',
            'end_at'       => 'nullable|date|after_or_equal:start_at',
            'lieu_id'      => 'nullable|exists:lieux,id',
            'capacity'     => 'nullable|integer|min:0',
            'status'       => 'required|in:draft,published',
            'material_ids'   => 'array',
            'material_ids.*' => 'exists:materials,id',
            'quantities'     => 'array',
            'quantities.*'   => 'nullable|integer|min:1',
        ]);

        $workshop->update($data);

        $sync = [];
        foreach (($request->input('material_ids', []) ?? []) as $mid) {
            $q = (int)($request->input("quantities.$mid") ?? 1);
            $sync[$mid] = ['quantity' => max(1, $q)];
        }
        $workshop->materials()->sync($sync);

        return redirect()->route('admin.workshops.index')->with('success','Workshop mis à jour.');
    }

    public function destroy(Workshop $workshop)
    {
        $workshop->materials()->detach();
        $workshop->delete();
        return back()->with('success','Workshop supprimé.');
    }
}
