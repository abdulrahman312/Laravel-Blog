<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Create a var and store all the posts in it
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        // REturn a view and pass in the above var
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
            'title' => 'required | max:255',
            'slug' => 'required | alpha_dash | min:5 | max:255 | unique:posts,slug',
            'category_id' => 'required | integer',
            'body' => 'required'

        ));

        //Store in the database. App\Post needed to be used above.
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->category_id = $request->category_id;

        $post->save();

        //flash will be a variable that will exists only for one page request. We can use session::put
        //to store the variable for entire session(120 mins)
        Session::flash('success', 'The blog post was successfully saved!' );

        //Redirect the user
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the post in DB and store it in var
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }


        //return the view and pass in the var
        return view('posts.edit')->withPost($post)->withCategories($cats);
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
        // Validate the data
        $post = Post::find($id);
        if($request->input('slug') == $post->slug){
            $this->validate($request, array(
                'title' => 'required | max:255',
                'category_id' => 'required | integer',
                'body' => 'required'
            ));
        }else{
            $this->validate($request, array(
                'title' => 'required | max:255',
                'slug' => 'required | alpha_dash | min:5 | max:255 | unique:posts,slug',
                'category_id' => 'required | integer',
                'body' => 'required'
            ));
        }


        // Save the data to DB
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        $post->save();

        // Set flash data with success message
        Session::flash('success', 'This post was successfully Updated.');

        // REdirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
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

        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('posts.index');

    }
}








