<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('faculty_group')->orderBy('order')->get()->groupBy('faculty_group');
        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.departments.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = Str::slug($data['name']);

        // Make slug unique
        $base = $data['slug'];
        $i = 2;
        while (Department::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $base . '-' . $i++;
        }

        $data['highlights']         = $this->linesToJson($request->input('highlights_text'));
        $data['facilities']         = $this->linesToJson($request->input('facilities_text'));
        $data['programmes_offered'] = $this->parseProgrammes($request->input('programmes', []));
        $data['has_phd']            = $request->boolean('has_phd');
        $data['is_active']          = $request->boolean('is_active', true);

        Department::create($data);

        return redirect()->route('admin.departments.index')->with('success', 'Department created successfully.');
    }

    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $data = $this->validateData($request, $department->id);

        $data['highlights']         = $this->linesToJson($request->input('highlights_text'));
        $data['facilities']         = $this->linesToJson($request->input('facilities_text'));
        $data['programmes_offered'] = $this->parseProgrammes($request->input('programmes', []));
        $data['has_phd']            = $request->boolean('has_phd');
        $data['is_active']          = $request->boolean('is_active');

        $department->update($data);

        return redirect()->route('admin.departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('admin.departments.index')->with('success', 'Department deleted.');
    }

    private function validateData(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name'             => 'required|string|max:255',
            'faculty_group'    => 'required|in:arts,science,commerce,inter',
            'icon'             => 'nullable|string|max:100',
            'color'            => 'nullable|in:blue,green,purple,red,orange,teal,indigo,sky',
            'established_year' => 'nullable|integer|min:1800|max:2100',
            'hod_name'         => 'nullable|string|max:255',
            'intake_ug'        => 'nullable|integer|min:0',
            'intake_pg'        => 'nullable|integer|min:0',
            'about'            => 'nullable|string',
            'vision'           => 'nullable|string',
            'mission'          => 'nullable|string',
            'goals'            => 'nullable|string',
            'order'            => 'nullable|integer|min:0',
        ]);
    }

    private function linesToJson(?string $text): ?string
    {
        if (! $text) return null;
        $lines = array_values(array_filter(array_map('trim', explode("\n", $text))));
        return $lines ? json_encode($lines) : null;
    }

    private function parseProgrammes(array $programmes): ?string
    {
        $clean = array_filter($programmes, fn($p) => ! empty(trim($p['subject'] ?? '')));
        $rows  = array_values(array_map(function ($p) {
            return [
                'class'   => trim($p['class'] ?? ''),
                'subject' => trim($p['subject'] ?? ''),
                'type'    => trim($p['type'] ?? ''),
                'credits' => isset($p['credits']) && $p['credits'] !== '' ? (int) $p['credits'] : null,
            ];
        }, $clean));
        return $rows ? json_encode($rows) : null;
    }
}
