<?php

namespace App\Http\Controllers;

use Session;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(5);
        
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Tag::create([
            'name' => $request->name
        ]);

        Session::flash('success', 'A tag was added.');

        return redirect()->route('tags.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin.tags.edit', compact('tag'));
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
        $this->validate($request, [
            'name' => 'required'
        ]);

        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'A tag has been updated.');

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);

        Session::flash('success', 'A tag has been trashed.');

        return redirect()->route('tags.index');
    }

    /* 
        A view for trashed tags.
    */
    public function trashed()
    {
        $tags = Tag::onlyTrashed()->paginate(5);

        return view('admin.tags.trashed', compact('tags'));
    }

    /* 
        Restore a trashed tag.
    */
    public function restore($id)
    {
        $tag = Tag::withTrashed()->where('id', $id)->first();
        $tag->deleted_at = null;
        $tag->save();

        Session::flash('success', 'A tag was restored.');

        return redirect()->route('tags.index');
    }

    /* 
        Permanently delete a tag.
    */
    public function delete($id)
    {
        Tag::forceDelete($id);

        Session::flash('success', 'A tag was permanently deleted.');

        return redirect()->route('tags.index');
    }
}
