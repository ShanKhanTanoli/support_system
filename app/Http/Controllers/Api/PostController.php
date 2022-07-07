<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'posts' => Post::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        try {


            Post::create($validated);

            return response()->json([
                'message' => 'Post Created',
                'status' => 200,
            ]);
        } catch (Exception $e) {

            return response()->json([
                'message' => 'Something went wrong',
                'status' => 500,
            ]);
        }
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
            'post' => $post,
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
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        try {

            $post = Post::find($id);

            $post->update($validated);

            return response()->json([
                'message' => 'Post Updated',
                'status' => 200,
            ]);
        } catch (Exception $e) {

            return response()->json([
                'message' => 'Something went wrong',
                'status' => 500,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $post = Post::find($id);

            $post->delete();

            return response()->json([
                'message' => 'Post Deleted',
                'status' => 200,
            ]);
        } catch (Exception $e) {

            return response()->json([
                'message' => 'Something went wrong',
                'status' => 500,
            ]);
        }
    }
}
