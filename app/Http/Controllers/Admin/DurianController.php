<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Durian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DurianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $durians = Durian::latest()->paginate(5);

        return view('pages.admin.durian.index')->with([
            'durians' => $durians
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.durian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|max:11',
            'stock' => 'required|max:11',
            'image' => 'required|mimes:jpg,png,jpeg'
        ]);

        $image = $request->file('image')->store('images');

        Durian::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $image,
        ]);

        return redirect()->route('durians.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $durian = Durian::findOrFail($id);

        return view('pages.admin.durian.edit')->with([
            'durian' => $durian,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|max:11',
            'stock' => 'required|max:11',
            'image' => 'mimes:jpg,png,jpeg'
        ]);

        // $image = $request->hasFile('image') ? $request->file('image')->store('images') : $request->old_image;

        switch (true) {
            case $request->hasFile('image'):
                $image = $request->file('image')->store('images');
                if (Storage::exists($request->old_image)) Storage::delete($request->old_image);
                break;
            default:
                $image = $request->old_image;
                break;
        }

        Durian::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $image,
        ]);

        return redirect()->route('durians.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $durian = Durian::findOrFail($id);

        if (Storage::exists($durian->image)) Storage::delete($durian->image);

        Durian::destroy($id);

        return redirect()->route('durians.index');
    }
}
