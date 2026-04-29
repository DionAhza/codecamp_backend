<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $idEdit;
    public $checkEdit = false;

    public function index()
    {
        //
        $editId = $this->idEdit;
        $posts = Post::all();
        $checkEdit = $this->checkEdit;
        return view('index',compact('posts','editId','checkEdit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->back()->with('message','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
            $this->idEdit = $id;
            $this->checkEdit = true;
            return redirect()->back();
    }

    public function clear(){
        $this->idEdit = null;
        $this->checkEdit = false;
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','berhasil hapus data');
    }
}
