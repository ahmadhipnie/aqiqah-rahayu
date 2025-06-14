<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('admin.galeri_admin.galeri_admin', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri_admin.galeri_create');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri_admin.galeri_edit', compact('galeri'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_galeri' => 'required',
            'gambar_galeri' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('gambar_galeri');
        $filename = 'galeri_' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/gambar_galeri', $filename);

        Galeri::create([
            'judul_galeri' => $request->judul_galeri,
            'gambar_galeri' => $filename,
        ]);

        Alert::success('Berhasil', 'Galeri berhasil ditambahkan');
        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul_galeri' => 'required',
            'gambar_galeri' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['judul_galeri']);

        if ($request->hasFile('gambar_galeri')) {
            if ($galeri->gambar_galeri && Storage::exists('public/gambar_galeri/' . $galeri->gambar_galeri)) {
                Storage::delete('public/gambar_galeri/' . $galeri->gambar_galeri);
            }
            $file = $request->file('gambar_galeri');
            $filename = 'galeri_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/gambar_galeri', $filename);
            $data['gambar_galeri'] = $filename;
        }

        $galeri->update($data);

        Alert::success('Berhasil', 'Galeri berhasil diubah');
        return redirect()->back()->with('success', 'Galeri berhasil diubah');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        if ($galeri->gambar_galeri && Storage::exists('public/gambar_galeri/' . $galeri->gambar_galeri)) {
            Storage::delete('public/gambar_galeri/' . $galeri->gambar_galeri);
        }
        $galeri->delete();

        Alert::success('Berhasil', 'Galeri berhasil dihapus');
        return redirect()->back()->with('success', 'Galeri berhasil dihapus');
    }
}
