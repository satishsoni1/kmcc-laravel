<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category', 'all');

        $query = GalleryItem::where('is_active', true)->orderBy('order')->orderBy('created_at', 'desc');

        if ($category !== 'all') {
            $query->where('category', $category);
        }

        $items      = $query->get();
        $categories = GalleryItem::where('is_active', true)->distinct()->pluck('category')->sort()->values();

        return view('gallery.index', compact('items', 'categories', 'category'));
    }
}
