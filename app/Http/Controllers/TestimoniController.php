<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::latest()->get();
        return view('admin.testimoni_admin.testimoni_admin', compact('testimonis'));
    }

    public function create()
    {
        return view('admin.testimoni_admin.testimoni_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemberi_testimoni' => 'required',
            'isi_testimoni' => 'required',
            'jumlah_bintang' => 'required|integer|min:1|max:5',
        ]);

        Testimoni::create($request->all());

        return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil ditambahkan');
    }

    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.testimoni_admin.testimoni_edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemberi_testimoni' => 'required',
            'isi_testimoni' => 'required',
            'jumlah_bintang' => 'required|integer|min:1|max:5',
        ]);

        $testimoni = Testimoni::findOrFail($id);
        $testimoni->update($request->all());

        return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil diubah');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();
        return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil dihapus');
    }
}
