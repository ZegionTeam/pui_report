<?php

namespace App\Http\Controllers\Web;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'category' => 'required',
            ]);
            $data = $request->all();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = time() . '.' . $image->extension();
                Storage::putFileAs('public/images', $image, $image_name);
                $data['image'] = $image_name;
            }

            $menu = Menu::create([
                'name' => $data['name'],
                'price' => $data['price'],
                'description' => $data['description'],
                'category' => $data['category'],
                'image' => $data['image'] ?? null,
            ]);

            if ($menu) {
                return redirect()->back()->with('success', 'Menu added successfully');
            }

            return redirect()->back()->with('error', 'Failed to add menu');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to add menu');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'category' => 'required',
            ]);

            $data = $request->all();
            $menu = Menu::findOrFail($id);
            // dd($menu);

            if ($request->hasFile('image')) {
                $menu->image && Storage::delete('public/images/' . $menu->image);
                $image = $request->file('image');
                $image_name = time() . '.' . $image->extension();
                Storage::putFileAs('public/images', $image, $image_name);
                $data['image'] = $image_name;
            }

            $menu->update([
                'name' => $data['name'],
                'price' => $data['price'],
                'description' => $data['description'],
                'category' => $data['category'],
                'image' => $data['image'] ?? null,
            ]);

            return redirect()->back()->with('success', 'Menu updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to update menu');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $menu = Menu::findOrFail($id);
            if ($menu->image) {
                Storage::delete('public/images/' . $menu->image);
            }
            $menu->delete();
            return redirect()->back()->with('success', 'Menu deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to delete menu');
        }
    }
}
