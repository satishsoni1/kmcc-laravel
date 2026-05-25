<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\ResearchArticle;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Illuminate\Support\Collection;

class ResearchArticlesImport implements ToCollection, WithHeadingRow, SkipsEmptyRows
{
    public array $errors  = [];
    public int   $imported = 0;

    private Collection $departmentSlugs;

    public function __construct()
    {
        $this->departmentSlugs = Department::active()->pluck('slug', 'name');
    }

    public function collection(Collection $rows): void
    {
        foreach ($rows as $index => $row) {
            $rowNum = $index + 2;

            $title   = trim((string) ($row['title'] ?? ''));
            $authors = trim((string) ($row['authors'] ?? ''));
            $journal = trim((string) ($row['journal_name'] ?? ''));
            $year    = intval($row['year'] ?? 0);

            if (empty($title) || empty($authors) || empty($journal) || $year < 1900 || $year > 2100) {
                $this->errors[] = "Row {$rowNum}: Missing required fields (title, authors, journal_name, year).";
                continue;
            }

            $deptSlug = null;
            if (!empty($row['department'])) {
                $deptName = trim((string) $row['department']);
                $deptSlug = $this->departmentSlugs->get($deptName)
                    ?? (Department::where('slug', $deptName)->exists() ? $deptName : null);
            }

            ResearchArticle::create([
                'title'           => $title,
                'authors'         => $authors,
                'journal_name'    => $journal,
                'year'            => $year,
                'volume'          => trim((string) ($row['volume'] ?? '')) ?: null,
                'issue'           => trim((string) ($row['issue'] ?? '')) ?: null,
                'page_no'         => trim((string) ($row['page_no'] ?? '')) ?: null,
                'doi'             => trim((string) ($row['doi'] ?? '')) ?: null,
                'department_slug' => $deptSlug,
                'is_active'       => true,
            ]);

            $this->imported++;
        }
    }
}
