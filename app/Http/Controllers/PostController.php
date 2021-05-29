<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Post::all(),200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $post=Post::create($this->validateRequest($request));
        $this->storeImage($request,$post);
        return response()->json("toatebune",200);
        }
        catch (\Exception $e){
            return response()->json(["err"=>$e->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('single_image',compact('post'));
        //return response()->json($post,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($this->validateRequest($request));
        $this->storeImage($request,$post);
        return response()->json("success update",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json("sters",200);
    }
    public function storeImage($request,$post){
        if($request->has('url')){
            $post->update([
                'url'=>$request->url->store('uploads','public'),
            ]);
            $image=Image::make(public_path('storage/'.$post->url));//->fit(300, 300, null, 'top-left');

            $image->save();
        }
    }
    public function validateRequest($request){
            return $request->validate([
                'title' => 'required|min:3',
                'description'=>'required',
            ]);
    }
}
