<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::All();

        return view('admin.categories.index', compact('categories'));
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

 
    public function store(Request $request)
    {
        $validator = request()->validate([

            'name' => 'required|min:3|unique:categories'

        ]);

        Category::create($validator);

        Session::flash('success','Category created successfully');

        return redirect('/admin/categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if(request()->name != $category->name)
            $validator = request()->validate(['name' => 'required|min:3|unique:categories']);
        else 
            $validator = request()->all();

        $category->update($validator);

        Session::flash('success','Category edited successfully');

        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        Session::flash('success','Category deleted successfully');

        return redirect('/admin/categories');
    }
}
