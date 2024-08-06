<?php

namespace App\Http\Controllers;


use App\Models\Stuff;
use App\Models\Category;
use App\Http\Requests\StoreStuffRequest;
use App\Http\Requests\UpdateStuffRequest;
use Illuminate\Support\Facades\Storage;


class StuffController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stuff = Stuff::with(['category','detail'])->get();
        return view('stuff.list', [
            'data' => $stuff,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('stuff.add', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStuffRequest $request)
    {
        if($request->file('file')){
            $path = $request->file('file')->store('stuff_photo');
            $request->merge(['image' => $path]);
        }else{
            $request->merge(['image' => '']);
        }
        Stuff::create($request->all());

        return redirect('/stuff')->with([
            'mess' => 'Data berhasil disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Stuff $stuff)
    {
        $categories = Category::where('status', 1)->get();
        return view('stuff.add', [
            'data' => $stuff,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stuff $stuff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStuffRequest $request, Stuff $stuff)
    {
        if($request->file('file')){
            $path = $request->file('file')->store('stuff_photo');
            $request->merge(['image' => $path]);
        }
        $stuff->fill($request->all());
        $stuff->save();

        return redirect('/stuff');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stuff $stuff)
    {
        if($stuff->image){
            Storage::delete($stuff->image);
        }
        $stuff->delete();

        return redirect('/stuff')->with([
            'mess' => 'Data berhasil dihapus',
        ]);
    }
}
