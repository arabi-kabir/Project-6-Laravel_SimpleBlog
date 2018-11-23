<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
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
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count() == 0 || $tags->count() == 0)
        {
            Session::flash('info', 'You must have some categories and tags before creating any post.');
            return redirect()->back();
        }
        return view('admin.posts.create', ['categories' => $categories, 'tags' => $tags]);
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
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        // Get Image
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('upload/post_image', $featured_new_name);

        // Insert to database
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->featured = 'upload/post_image/'.$featured_new_name;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title);
        $post->save();

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post Created Successfully');
        return redirect()->back();
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
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
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
        // dd($request);
        $post = Post::find($id);

        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'featured' => 'image',
            'category_id' => 'required'
        ]);

        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('upload/post_image', $featured_new_name);

            $post->featured = 'upload/post_image/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post Updated Successfully');
        return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'Post Trashed Successfully');
        return redirect()->back();
    }

    // Soft delete
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed', ['posts' => $posts]);
    }

    // Permanent Delete
    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        Session::flash('success', 'Post Deleted Permanently');

        return redirect()->back();
    }

    // Restore
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        Session::flash('success', 'Post Restored Successfully');

        return redirect()->route('posts');
    }
}
