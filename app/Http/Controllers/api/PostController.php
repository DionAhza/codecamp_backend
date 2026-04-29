<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Menampilkan semua data post
     */
    public function index()
    {
        $posts = Post::with('user')->get();

        return response()->json([
            'message' => 'Data berhasil diambil',
            'data' => $posts
        ], 200);
    }

    /**
     * Form create (biasanya tidak dipakai di REST API)
     */
    public function create()
    {
        return response()->json([
            'message' => 'Halaman create tidak digunakan di REST API'
        ], 200);
    }

    /**
     * Menyimpan data baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content
        ]);

        return response()->json([
            'message' => 'Post berhasil ditambahkan',
            'data' => $post
        ], 201);
    }

    /**
     * Menampilkan detail berdasarkan id
     */
    public function show( $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'message' => 'Detail post',
            'data' => $post
        ], 200);
    }

    /**
     * Form edit (biasanya tidak dipakai di REST API)
     */
    public function edit(string $id)
    {
        return response()->json([
            'message' => 'Halaman edit tidak digunakan di REST API'
        ], 200);
    }

    /**
     * Update data berdasarkan id
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post tidak ditemukan'
            ], 404);
        }

        $post->update([
            'user_id' => $request->user_id ?? $post->user_id,
            'title' => $request->title ?? $post->title,
            'content' => $request->content ?? $post->content
        ]);

        return response()->json([
            'message' => 'Post berhasil diupdate',
            'data' => $post
        ], 200);
    }

    /**
     * Menghapus data
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post tidak ditemukan'
            ], 404);
        }

        $post->delete();

        return response()->json([
            'message' => 'Post berhasil dihapus'
        ], 200);
    }
}