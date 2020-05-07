<?php

namespace App\Http\Controllers;

use App\Post;

use App\Category;

use App\Tag;

use Illuminate\Http\Request;

use App\Http\Requests\Posts\CreatePostRequest;

use App\Http\Requests\Posts\UpdatePostRequest;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all())->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //$image = $request->image->store('posts');

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $request->file('image')->store('posts','public'),
            'published_at' => $request->published_at,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id
        ]);

        if ($request->tags)
        {
            $post->tags()->attach($request->tags); //Associate a tag and a post in a Many to Many relationship
        }

        session()->flash('success', 'Post created successfully!');

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        $data = $request->only(['title', 'description', 'content', 'published_at']);

        // check if there is a new image or a replacement
        if ($request->hasFile('image'))
        {
            // upload the new image
            $image = $request->file('image')->store('posts','public');

            //delete the old image
            $post->deleteImage(); //called from Post model

            $data['image'] = $image;
        }

        $post['category_id'] = $request->category; //Category doesn't update so add this

        if ($request->tags)
        {
            $post->tags()->sync($request->tags); // syncs tags to db when updating
        }

        //update attributes
        $post->update($data);

        //flash message
        session()->flash('success','Post updated successfully!');

        //redirect user
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        
        if ($post->trashed())
        {
            $post->deleteImage();//For permanently deleting the image in the project folder

            $post->forceDelete();
        }
        else 
        {
            $post->delete();
        }

        session()->flash('success', 'Post deleted successfully!');

        //return redirect('posts');
        return redirect('posts');
    }

    /**
     * Displays a list of trashed posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view('posts.index')->with('posts', $trashed);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        $post->restore();

        session()->flash('success', 'Post restored!');

        return redirect()->back();
    }
}
