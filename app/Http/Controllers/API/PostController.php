<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::take(10)->get();

      return response()->json(['posts' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->authorize('create', 'App\Post');

      $post = new Post;

      $post->title = $request->title;
      $post->text = $request->text;
      $post->user_id = $request->user()->id;

      $post->save();

      return response()->json(['stored' => true]);
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

      return response()->json([
          'title' => $post->title,
          'text' => $post->text,
          'user_name' => $post->user->name
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
      $post = Post::find($id);

      $this->authorize('create', $post);

      $post->title = $request->title;
      $post->text = $request->text;

      $post->save();

      return response()->json(['updated' => true]);
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

      $this->authorize('delete', $post);

      $post->delete();

      return response()->json(['destroyed' => true]);
    }
}
