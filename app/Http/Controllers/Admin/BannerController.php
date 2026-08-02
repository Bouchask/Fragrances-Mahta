<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('sort_order', 'asc')->latest()->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|max:5120', // allow up to 5MB images
            'image'    => 'nullable|image|max:5120',
            'title'    => 'nullable|string|max:255',
        ]);

        $files = [];
        if ($request->hasFile('images')) {
            $files = $request->file('images');
        } elseif ($request->hasFile('image')) {
            $files[] = $request->file('image');
        }

        if (empty($files)) {
            return redirect()->back()->withErrors(['image' => 'Veuillez sélectionner au moins une image.']);
        }

        $maxOrder = Banner::max('sort_order') ?? 0;

        foreach ($files as $file) {
            $extension = $file->extension();
            $base64 = base64_encode(file_get_contents($file));
            $imageData = 'data:image/' . $extension . ';base64,' . $base64;

            $maxOrder++;
            Banner::create([
                'title' => $request->title,
                'image_data' => $imageData,
                'sort_order' => $maxOrder,
                'is_active' => true,
            ]);
        }

        $count = count($files);
        $msg = $count > 1 ? "$count bannières ont été ajoutées avec succès au carrousel !" : "Bannière ajoutée avec succès !";

        return redirect()->route('admin.banners.index')->with('success', $msg);
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title'      => 'nullable|string|max:255',
            'sort_order' => 'required|integer',
        ]);

        $banner->update([
            'title'      => $request->title,
            'sort_order' => $request->sort_order,
            'is_active'  => $request->has('is_active'),
        ]);

        return redirect()->back()->with('success', 'Bannière mise à jour.');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banners.index')->with('success', 'Bannière supprimée du carrousel.');
    }
}
