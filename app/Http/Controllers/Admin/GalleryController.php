<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $items = GalleryItem::orderBy('order')->orderBy('created_at', 'desc')->paginate(24);
        return view('admin.gallery.index', compact('items'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'required|in:general,events,sports,academics,campus',
            'order'    => 'nullable|integer|min:0',
            'images'   => 'required|array|min:1',
            'images.*' => 'required|image|max:5120',
        ]);

        $category    = $request->input('category');
        $description = $request->input('description');
        $order       = $request->input('order', 0);

        foreach ($request->file('images') as $image) {
            $path = $image->store('gallery', 'public');
            GalleryItem::create([
                'title'       => $request->input('title'),
                'description' => $description,
                'image_path'  => $path,
                'category'    => $category,
                'order'       => $order,
                'is_active'   => $request->boolean('is_active', true),
            ]);
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery images uploaded successfully.');
    }

    public function destroy(GalleryItem $gallery)
    {
        Storage::disk('public')->delete($gallery->image_path);
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Image deleted.');
    }
}
