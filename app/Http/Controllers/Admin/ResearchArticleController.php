<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\ResearchArticle;
use Illuminate\Http\Request;

class ResearchArticleController extends Controller
{
    public function index()
    {
        $articles = ResearchArticle::with('department')->latest()->paginate(20);
        return view('admin.research-articles.index', compact('articles'));
    }

    public function create()
    {
        $departments = Department::active()->orderBy('order')->get();
        return view('admin.research-articles.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'           => 'required|string|max:500',
            'authors'         => 'required|string|max:1000',
            'journal_name'    => 'required|string|max:255',
            'year'            => 'required|integer|min:1900|max:2100',
            'volume'          => 'nullable|string|max:50',
            'issue'           => 'nullable|string|max:50',
            'page_no'         => 'nullable|string|max:50',
            'doi'             => 'nullable|string|max:255',
            'department_slug' => 'nullable|string|exists:departments,slug',
            'is_active'       => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        ResearchArticle::create($data);

        return redirect()->route('admin.research-articles.index')->with('success', 'Research article added successfully.');
    }

    public function edit(ResearchArticle $researchArticle)
    {
        $departments = Department::active()->orderBy('order')->get();
        return view('admin.research-articles.edit', compact('researchArticle', 'departments'));
    }

    public function update(Request $request, ResearchArticle $researchArticle)
    {
        $data = $request->validate([
            'title'           => 'required|string|max:500',
            'authors'         => 'required|string|max:1000',
            'journal_name'    => 'required|string|max:255',
            'year'            => 'required|integer|min:1900|max:2100',
            'volume'          => 'nullable|string|max:50',
            'issue'           => 'nullable|string|max:50',
            'page_no'         => 'nullable|string|max:50',
            'doi'             => 'nullable|string|max:255',
            'department_slug' => 'nullable|string|exists:departments,slug',
            'is_active'       => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $researchArticle->update($data);

        return redirect()->route('admin.research-articles.index')->with('success', 'Research article updated successfully.');
    }

    public function destroy(ResearchArticle $researchArticle)
    {
        $researchArticle->delete();
        return redirect()->route('admin.research-articles.index')->with('success', 'Research article deleted.');
    }
}
