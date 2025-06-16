<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningMaterial;
use Illuminate\Support\Facades\Auth;

class LearningMaterialController extends Controller
{
    /**
     * Show list of materials uploaded by the teacher (index view)
     */
   public function index()
{
    $materials = LearningMaterial::where('teacher_id', auth()->id())->latest()->get();
    return view('materials.index', compact('materials'));
}

    /**
     * Show the form to upload a new material
     */
    public function create()
    {
        return view('materials.add-material'); 
    }

    /**
     * Store the uploaded material
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'instructions' => 'nullable|string',
            'file' => 'required|mimes:pdf,doc,docx,txt|max:10240',
        ]);

        $path = $request->file('file')->store('materials', 'public');

        LearningMaterial::create([
            'teacher_id' => Auth::id(),
            'title' => $request->title,
            'instructions' => $request->instructions,
            'file_path' => $path,
        ]);

        return redirect()->route('teacher.materials.index')->with('success', 'Material uploaded.');
    }

    /**
     * Show form to edit material
     */
    public function edit($id)
    {
        $material = LearningMaterial::where('id', $id)
            ->where('teacher_id', auth()->id())
            ->firstOrFail();

        return view('materials.edit', compact('material'));
    }

    /**
     * Update existing material
     */
    public function update(Request $request, $id)
    {
        $material = LearningMaterial::where('id', $id)
            ->where('teacher_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'instructions' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,doc,docx,txt|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('materials', 'public');
            $material->file_path = $path;
        }

        $material->title = $request->title;
        $material->instructions = $request->instructions;
        $material->save();

        return redirect()->route('teacher.materials.index')->with('success', 'Material updated.');
    }

    /**
     * Delete a material
     */
    public function destroy($id)
    {
        $material = LearningMaterial::where('id', $id)
            ->where('teacher_id', auth()->id())
            ->firstOrFail();

        $material->delete();

        return redirect()->route('teacher.materials.index')->with('success', 'Material deleted.');
    }

    /**
     * View materials as student
     */
    public function studentIndex()
    {
        $materials = LearningMaterial::with('teacher')->latest()->get();
        return view('materials.student-view', compact('materials'));
    }
}
