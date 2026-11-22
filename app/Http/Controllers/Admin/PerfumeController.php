<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use App\Models\Brand;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function index()
    {
        $perfumes = Perfume::with('brand')->latest()->get();
        return view('admin.perfumes.index', compact('perfumes'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('admin.perfumes.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'top_notes' => 'required',
            'middle_notes' => 'required',
            'base_notes' => 'required',
            'occasion' => 'required',
            'price_range' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/perfumes'), $imageName);
            $imagePath = 'uploads/perfumes/' . $imageName;
        }

        Perfume::create([
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'description' => $request->description,
            'top_notes' => $request->top_notes,
            'middle_notes' => $request->middle_notes,
            'base_notes' => $request->base_notes,
            'occasion' => $request->occasion,
            'price_range' => $request->price_range,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.perfumes.index')->with('success', 'Data parfum berhasil ditambahkan!');
    }
}