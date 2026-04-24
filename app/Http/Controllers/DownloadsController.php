<?php

namespace App\Http\Controllers;

use App\Models\Download;

class DownloadsController extends Controller
{
    public function index()
    {
        $downloads = Download::where('is_active', true)
            ->orderBy('category')
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('category');

        return view('downloads.index', compact('downloads'));
    }
}
