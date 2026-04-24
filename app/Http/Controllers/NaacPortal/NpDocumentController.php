<?php
namespace App\Http\Controllers\NaacPortal;
use App\Models\NaacPortal\{NpDocument, NpCriterion, NpMetric, NpDepartment};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class NpDocumentController extends NpBaseController {
    public function index(Request $request) {
        $cid   = $this->collegeId();
        $query = NpDocument::where('college_id', $cid)->with('uploader', 'metric.criterion', 'criteria');
        if ($request->criterion_id) $query->where('metric_id', fn($q) => $q->whereIn('id', NpMetric::where('criterion_id', $request->criterion_id)->pluck('id')));
        if ($request->department_id) $query->where('department_id', $request->department_id);
        if ($request->year) $query->where('academic_year', $request->year);
        if ($request->search) $query->where('title', 'like', '%' . $request->search . '%');
        if ($request->file_type) $query->where('file_type', $request->file_type);
        $docs    = $query->orderByDesc('created_at')->paginate(20)->withQueryString();
        $criteria = NpCriterion::where('is_active', true)->orderBy('number')->get();
        $depts   = NpDepartment::where('college_id', $cid)->orderBy('name')->get();
        $years   = NpDocument::where('college_id', $cid)->distinct()->orderByDesc('academic_year')->pluck('academic_year')->filter();
        return view('naac-portal.documents.index', compact('docs', 'criteria', 'depts', 'years'));
    }
    public function create() {
        $criteria = NpCriterion::where('is_active', true)->orderBy('number')->with('metrics')->get();
        $depts    = NpDepartment::where('college_id', $this->collegeId())->orderBy('name')->get();
        return view('naac-portal.documents.create', compact('criteria', 'depts'));
    }
    public function store(Request $request) {
        $cid  = $this->collegeId();
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'metric_id'   => 'nullable|exists:np_metrics,id',
            'department_id' => 'nullable|exists:np_departments,id',
            'academic_year' => 'nullable|string|max:10',
            'tags'        => 'nullable|string',
            'criterion_ids' => 'nullable|array',
            'criterion_ids.*' => 'exists:np_criteria,id',
            'is_public'   => 'boolean',
            'file'        => 'required|file|max:20480',
        ]);
        $file      = $request->file('file');
        $hash      = md5_file($file->getRealPath());
        $duplicate = NpDocument::where('college_id', $cid)->where('file_hash', $hash)->first();
        $path      = $file->store('np/documents/' . $cid, 'public');
        $doc = NpDocument::create([
            'college_id'    => $cid,
            'uploaded_by'   => auth()->id(),
            'metric_id'     => $data['metric_id'] ?? null,
            'department_id' => $data['department_id'] ?? null,
            'title'         => $data['title'],
            'description'   => $data['description'] ?? null,
            'file_path'     => $path,
            'file_name'     => $file->getClientOriginalName(),
            'file_type'     => $file->getClientOriginalExtension(),
            'file_size'     => $file->getSize(),
            'academic_year' => $data['academic_year'] ?? null,
            'tags'          => $data['tags'] ? array_map('trim', explode(',', $data['tags'])) : null,
            'file_hash'     => $hash,
            'is_public'     => $request->boolean('is_public'),
        ]);
        if (!empty($data['criterion_ids'])) {
            $doc->criteria()->sync($data['criterion_ids']);
        }
        $msg = 'Document uploaded successfully.';
        if ($duplicate) $msg .= ' Note: A duplicate file was detected (similar to "' . $duplicate->title . '").';
        return redirect()->route('np.documents.index')->with('success', $msg);
    }
    public function download(NpDocument $document) {
        $document->increment('download_count');
        return Storage::disk('public')->download($document->file_path, $document->file_name);
    }
    public function destroy(NpDocument $document) {
        Storage::disk('public')->delete($document->file_path);
        $document->delete();
        return back()->with('success', 'Document deleted.');
    }
}
