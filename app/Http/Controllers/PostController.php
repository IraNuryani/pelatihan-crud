<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //query get data

        $post = Post::orderBy('id','ASC')->get();

        // dd($post);

        return view ('post.index', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        Post::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        // digunakan untuk mengembalikan ke tampilan index post jika data berhasil di simpan
        return redirect()->route('post.index');
    }

    public function edit($id)
    {
        // query get id
        $data = Post::findOrFail($id);

        return view('post.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        $data = Post::findOrFail($id);

        $data->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        // digunakan untuk mengembalikan ke tampilan index post jika data berhasil di simpan
        return redirect()->route('post.index');
    }

    // hapus data
    public function destroy($id)
    {
        $data = Post::findOrFail($id);
        $data->delete();

        return redirect()->route('post.index');
    }
}
