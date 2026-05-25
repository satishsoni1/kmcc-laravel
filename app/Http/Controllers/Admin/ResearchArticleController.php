<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ResearchArticlesImport;
use App\Models\Department;
use App\Models\ResearchArticle;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    // ── Bulk Import ────────────────────────────────────────────────────────────

    public function importForm()
    {
        $departments = Department::active()->orderBy('order')->get();
        return view('admin.research-articles.import', compact('departments'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:5120',
        ]);

        $import = new ResearchArticlesImport();
        Excel::import($import, $request->file('file'));

        $msg = "Imported {$import->imported} article(s) successfully.";
        if (!empty($import->errors)) {
            $msg .= ' Skipped rows: ' . implode(' | ', $import->errors);
        }

        return redirect()->route('admin.research-articles.index')
            ->with('success', $msg);
    }

    public function downloadTemplate()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Research Articles');

        // Headers
        $headers = ['title', 'authors', 'journal_name', 'year', 'volume', 'issue', 'page_no', 'doi', 'department'];
        foreach ($headers as $col => $header) {
            $cell = chr(65 + $col) . '1';
            $sheet->setCellValue($cell, $header);
            $sheet->getStyle($cell)->getFont()->setBold(true);
            $sheet->getColumnDimension(chr(65 + $col))->setAutoSize(true);
        }

        // Style header row
        $sheet->getStyle('A1:I1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FF2D4077');
        $sheet->getStyle('A1:I1')->getFont()->getColor()->setARGB('FFFFFFFF');

        // Sample data row
        $sheet->fromArray([[
            'Study on Organic Compounds',
            'Dr. A. Sharma, Dr. B. Patil',
            'Journal of Chemical Sciences',
            date('Y'),
            '10',
            '2',
            '123-130',
            'https://doi.org/10.1000/xyz123',
            '',
        ]], null, 'A2');

        // Notes row
        $sheet->setCellValue('A3', '← Fill from row 2 onwards. department column: use exact department name or leave blank.');
        $sheet->getStyle('A3')->getFont()->setItalic(true)->setSize(9);
        $sheet->getStyle('A3')->getFont()->getColor()->setARGB('FF888888');
        $sheet->mergeCells('A3:I3');

        $writer = new Xlsx($spreadsheet);
        $filename = 'research_articles_import_template.xlsx';

        return response()->stream(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            'Content-Type'        => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Cache-Control'       => 'max-age=0',
        ]);
    }
}
