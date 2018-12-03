<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(!count(Category::all())){ //if there are no categories available

            Session::flash('info','There are no categories to create a blog post !');
            return redirect()->back();

        }

        return view('admin.posts.create')->with('categories', \App\Category::All());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = request()->validate([

            'title' => 'required|min:3',
            'content' => 'required|min:5',
            'featured' => 'required|image',
            'category_id' => 'required'

        ]);

        /****
        * File upload on server
        ****/

        $featured = request()->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);
        $featured_new_name = "uploads/posts/" . $featured_new_name;

        Post::create([
            'title' => request()->title,
            'content' => request()->content,
            'category_id' => request()->category_id,
            'featured' => $featured_new_name,
            'slug' => str_slug(request()->title,'-')
        ]);

        Session::flash('success','Post created successfully');

        return redirect('/admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * trash the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        Session::flash('success','Post trashed successfully !');

        return redirect('/admin/posts');
    }

    /**
     * Permanently delete the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kill($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();

        $post->forceDelete();

        Session::flash('success','Post deleted successfully !');

        return redirect('/admin/posts/trashed');
    }

    /**
     * Get only the trashed posts
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed',compact('posts'));
    }
}
