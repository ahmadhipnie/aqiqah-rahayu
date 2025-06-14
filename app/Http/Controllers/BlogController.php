<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blogs::latest()->get();
        return view('admin.blog_admin.blog_admin', compact('blogs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_blog' => 'required',
            'deskripsi_blog' => 'required',
            'kategori_blog' => 'required',
            'gambar_blog' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('gambar_blog');
        $filename = 'blog_' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/gambar_blog', $filename);

        Blogs::create([
            'judul_blog' => $request->judul_blog,
            'deskripsi_blog' => $request->deskripsi_blog,
            'kategori_blog' => $request->kategori_blog,
            'gambar_blog' => $filename,
        ]);


        Alert::success('Success', 'Blog berhasil ditambahkan');
        return redirect()->route('admin.blog')->with('success', 'Blog berhasil ditambahkan');
    }

    public function create()
    {
        return view('admin.blog_admin.blog_create');
    }

    public function edit($id)
    {
        $blog = Blogs::findOrFail($id);
        return view('admin.blog_admin.blog_edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blogs::findOrFail($id);

        $request->validate([
            'judul_blog' => 'required',
            'deskripsi_blog' => 'required',
            'kategori_blog' => 'required',
            'gambar_blog' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['judul_blog', 'deskripsi_blog', 'kategori_blog']);

        if ($request->hasFile('gambar_blog')) {
            // Hapus gambar lama
            if ($blog->gambar_blog && Storage::exists('public/gambar_blog/' . $blog->gambar_blog)) {
                Storage::delete('public/gambar_blog/' . $blog->gambar_blog);
            }
            $file = $request->file('gambar_blog');
            $filename = 'blog_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/gambar_blog', $filename);
            $data['gambar_blog'] = $filename;
        }

        $blog->update($data);

        Alert::success('Success', 'Blog berhasil diubah');
        return redirect()->route('admin.blog')->with('success', 'Blog berhasil diubah');
    }

    public function destroy($id)
    {
        $blog = Blogs::findOrFail($id);
        if ($blog->gambar_blog && Storage::exists('public/gambar_blog/' . $blog->gambar_blog)) {
            Storage::delete('public/gambar_blog/' . $blog->gambar_blog);
        }
        $blog->delete();

        Alert::success('Success', 'Blog berhasil dihapus');
        return redirect()->route('admin.blog')->with('success', 'Blog berhasil dihapus');
    }
}
