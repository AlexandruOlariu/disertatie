<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getView($viewName)
    {
        if (request()->segment(1) == 'amp') {
            if (view()->exists($viewName . '-amp')) {
                $viewName .= '-amp';
            } else {
                abort(404);
            }
        }
        return $viewName;
    }

    public function getAllPosts()
    {
        $post = Post::all();

        return view("welcome", ['post' => $post]);
    }

    public function index()
    {
        return response()->json(Post::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $post = Post::create($this->validateRequest($request));
            if($this->storeImage($request, $post)){
            return response()->json("ok", 200);
            }
        } catch (\Exception $e) {
            return response()->json(["err" => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view($this->getView('single_image'), compact('post'));
        //return response()->json($post,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($this->validateRequest($request));
        $this->storeImage($request, $post);
        return response()->json("success update", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json("sters", 200);
    }

    public function storeImage($request, $post)
    {
        try {
            if ($request->has('url')) {
                $postName=str_replace(' ',"_",strtolower($request->alt))."_".$post->id;
                if(strlen($postName)<1){
                    $postName=$post->id;
                }
                $post->update([
                    'url_low_res' => 'uploads_low_res/'.$postName,
                    'url' => 'uploads/'.$postName,
                ]);
                $local_upload='storage/'.$request->url->store('uploads_from_local','public');

                $imageMaker=Image::make(public_path($local_upload));

                $image = $imageMaker;
                $image->save(public_path('storage/uploads/'.$postName.'.jpg'),100);

                $image_low_res = $imageMaker->resize(null, 1080, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_low_res->save(public_path('storage/uploads_low_res/'.$postName.'.jpg'),80);
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }
        return false;
    }

    public function validateRequest($request)
    {
        return $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);
    }
}
