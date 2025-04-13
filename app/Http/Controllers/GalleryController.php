<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = auth()->user()->galleries()->latest()->paginate(9);
        return view('gallery.index', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate(['images.*' => 'required|image']);

        foreach ($request->file('images') as $img) {
            $path = $img->store('uploads', 'public');
            auth()->user()->galleries()->create(['image_path' => $path]);
        }

        return back()->with('success', 'Images uploaded!');
    }

    public function destroy($id)
    {
        $image = Gallery::where('user_id', auth()->id())->findOrFail($id);
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Image deleted!');
    }

}
