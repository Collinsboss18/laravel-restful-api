<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Exception;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(POST::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $post = Post::create($request->all());
            return response()->json($post);
        } catch (Exception $e) {
            report($e);
            return $e->getMessage();
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
        try {
            if (Post::find($id) == true) return response()->json(Post::findOrFail($id));
            $res = array( "message" => "Post dose not exist" );
            return response()->json($res);
        } catch (Exception $e) {
            report($e);
            return $e->getMessage();
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
        try {
            if (Post::find($id) == true) {
                $post = Post::findOrFail($id);
                $input = $request->all();
                $uPost = $post->update($input);
                return response()->json($uPost);
            }
            $res = array( "message" => "Post dose not exist" );
            return response()->json($res);
        } catch (Exception $e) {
            report($e);
            return $e->getMessage();
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
            if (Post::find($id) == true) {
                Post::destroy($id);
                $res = array( "message" => "Posted deleted" );
                return response()->json($res);
            }
            $res = array( "message" => "Post dose not exist" );
            return response()->json($res);
        } catch (Exception $e) {
            report($e);
            return $e->getMessage();
        }
    }
}
