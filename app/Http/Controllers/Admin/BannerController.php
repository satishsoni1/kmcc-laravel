<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('display_order')->orderBy('created_at', 'desc')->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'subtitle'      => 'nullable|string|max:255',
            'description'   => 'nullable|string|max:1000',
            'image'         => 'required|image|max:6144',
            'button_text'   => 'nullable|string|max:100',
            'button_link'   => 'nullable|string|max:500',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $path = $request->file('image')->store('banners', 'public');

        Banner::create([
            'title'         => $request->title,
            'subtitle'      => $request->subtitle,
            'description'   => $request->description,
            'image_path'    => $path,
            'button_text'   => $request->button_text,
            'button_link'   => $request->button_link,
            'display_order' => $request->input('display_order', 0),
            'is_active'     => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner slide added successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'subtitle'      => 'nullable|string|max:255',
            'description'   => 'nullable|string|max:1000',
            'image'         => 'nullable|image|max:6144',
            'button_text'   => 'nullable|string|max:100',
            'button_link'   => 'nullable|string|max:500',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $data = [
            'title'         => $request->title,
            'subtitle'      => $request->subtitle,
            'description'   => $request->description,
            'button_text'   => $request->button_text,
            'button_link'   => $request->button_link,
            'display_order' => $request->input('display_order', 0),
            'is_active'     => $request->boolean('is_active'),
        ];

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($banner->image_path);
            $data['image_path'] = $request->file('image')->store('banners', 'public');
        }

        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        Storage::disk('public')->delete($banner->image_path);
        $banner->delete();
        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted.');
    }
}
