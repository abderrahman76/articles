<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = \App\Models\categorie::paginate(5);
        //        dd($articles);
                return view('categories.index')->with(['categories'=>$categories]);
                // echo "hello from home";
    }

    public function sorte()
    {
        $user_id = auth()->id();
        $categories = \App\Models\categorie::where('user_id', $user_id)->get();
        //        dd($articles);
                return view('categories.categorie')->with(['categories'=>$categories]);
                // echo "hello from home";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:3|max:100',
            'description'=>'required|min:10|max:1000',
            
        ]);
        \App\Models\categorie::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>auth()->user()->id
        ]);

        return redirect()->route('mycategories');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categorie = \App\Models\categorie::findorfail($id);
        return view('categories.showcategorie')->with(['categorie'=>$categorie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $categorie = \App\Models\categorie::findorfail($request->id);
        $categorie->update([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        return redirect()->route('indexC');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $categorie = \App\Models\categorie::findorfail($request->id);
        $categorie->articles()->delete();
        $categorie->delete();
        return redirect()->route('mycategories');
    }
}
