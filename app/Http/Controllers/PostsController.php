<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('author')->paginate(4);
            $data = [
                'posts' => $posts
            ];
        return view('posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->created_by = Auth::user()->id;
        return $this->validateAndSave($post, $request);

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
            $data = [
                'post' => $post
            ];

            if(!$post) {
                abort(404);
            }

        return view('posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.1
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        // $user = Auth::user();

            if (Auth::id() == $post->created_by) {
                return view('posts.edit')->with(['post' => $post]);
            } else {
                session()->flash('error', 'You can\'t edit a post you don\'t own!');
                return redirect()->action('PostsController@index');
            }
    
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
        $post = Post::find($id);
        return $this->validateAndSave($post, $request);
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

        if (Auth::id() == $post->created_by) {
            $post->delete();
            session()->flash('message', 'Your post was deleted');
            return redirect()->action('PostsController@index');
        } else {
            session()->flash('error', 'You can\'t delete a post you don\'t own!');
            return redirect()->action('PostsController@index');
        }

    }

    private function validateAndSave(Post $post, Request $request)
    {
        $request->session()->flash('error', 'Store attempt unsuccessful');

        $this->validate($request, Post::$rules);

        $request->session()->forget('error');

        $post->title = $request->get('title');
        $post->url = $request->get('url');
        $post->content = $request->get('content');
        $post->save();

        $request->session()->flash('message', 'Post was saved successfully');
    }

    public function logoutUser()
    {
        session()->flash('message', 'You have logged out');
        Auth::logout();
        return redirect()->action('/login');
    }

}
