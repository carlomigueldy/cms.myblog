<?php

namespace App\Http\Controllers;

use Session;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        $trashed = Category::onlyTrashed()->paginate(5);

        return view('admin.categories.index', compact('categories', 'trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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

        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        Session::flash('success', 'You have successfully created a category.');

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
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

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();

        Session::flash('success', 'You have successfully updated the category.');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        Session::flash('success', 'You have successfully deleted the category.');

        return redirect()->route('categories.index');
    }

    /* 
        Restores a trashed category.
    */
    public function restore($id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();
        $category->deleted_at = null;
        $category->save();

        Session::flash('success', 'You have restored a category from trash.');

        return redirect()->route('categories.index');
    }

    /* 
        Permanently deletes a category from trash.
    */
    public function delete($id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();
        $category->forceDelete();

        Session::flash('success', 'You have deleted a category permanently.');

        return redirect()->route('categories.index');
    }
}
