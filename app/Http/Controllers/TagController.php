<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tags = Tag::paginate(10);
        return view('tags.index',compact('tags'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tag $tag)
    {
        //
        $this->authorize('create',$tag);
        return view('tags.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|string|min:3',
        ]);

        Tag::create($data);
        return back()->with('success', 'Tag Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tag = Tag::findOrFail($id);
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $tag = Tag::findOrFail($id);
        $data = $request->validate([
        'name' => 'required|string|min:3',
        ]);
        $tag->update($data);
        return redirect()
        ->route('tags.index')
        ->with('success', 'Tag Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return back()->with('success', 'Tag Deleted Successfully.');
    }
}
