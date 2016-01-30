<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('posts.index');
        $posts = Post::all();
        $data = [
            'posts'=>$posts,
        ];
        return view('posts.index',$data);
    }

    public function show($id) {        
        $posts = Post::find($id);
        $data = compact('posts');
        return view('posts.show', $data);
    }

   /* public function hot(){
        $posts = Post::where('page_view','>',100)
        ->orderBy('id');
        $data = compact('posts');
        return view('posts.index',$data);
    }


    public function random() {
        $posts = Post::all()->random();
        $data = compact('posts');
        //$id = rand(1, 10);
        //$data = compact('id');

        return view('posts.show', $data);
    }
*/
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
        //$post = \App\Post::create($request->all());
        //dd($request);
        return 'posts.store123';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);        
        $data = compact('post');
        return view('posts.edit', $data);
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
        $post = \App\Post::find($id);
        $post->update($request->all());
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
        //
    }
}
