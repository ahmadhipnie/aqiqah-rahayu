<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::latest()->get();
        return view('admin.events_admin.events_admin', compact('events'));
    }

    public function create()
    {
        return view('admin.events_admin.events_create');
    }

    public function edit($id)
    {
        $event = Events::findOrFail($id);
        return view('admin.events_admin.events_edit', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_events' => 'required',
            'tanggal_events' => 'required|date',
            'alamat_events' => 'required',
            'deskripsi_events' => 'required',
            'gambar_events' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('gambar_events');
        $filename = 'events_' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/gambar_events', $filename);

        Events::create([
            'judul_events' => $request->judul_events,
            'tanggal_events' => $request->tanggal_events,
            'alamat_events' => $request->alamat_events,
            'deskripsi_events' => $request->deskripsi_events,
            'gambar_events' => $filename,
        ]);

        Alert::success('Success', 'Event berhasil ditambahkan');
        return redirect()->route('admin.events')->with('success', 'Event berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $event = Events::findOrFail($id);

        $request->validate([
            'judul_events' => 'required',
            'tanggal_events' => 'required|date',
            'alamat_events' => 'required',
            'deskripsi_events' => 'required',
            'gambar_events' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['judul_events', 'tanggal_events', 'alamat_events', 'deskripsi_events']);

        if ($request->hasFile('gambar_events')) {
            if ($event->gambar_events && Storage::exists('public/gambar_events/' . $event->gambar_events)) {
                Storage::delete('public/gambar_events/' . $event->gambar_events);
            }
            $file = $request->file('gambar_events');
            $filename = 'events_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/gambar_events', $filename);
            $data['gambar_events'] = $filename;
        }

        $event->update($data);

        Alert::success('Success', 'Event berhasil diubah');
        return redirect()->route('admin.events')->with('success', 'Event berhasil diubah');
    }

    public function destroy($id)
    {
        $event = Events::findOrFail($id);
        if ($event->gambar_events && Storage::exists('public/gambar_events/' . $event->gambar_events)) {
            Storage::delete('public/gambar_events/' . $event->gambar_events);
        }
        $event->delete();

        Alert::success('Success', 'Event berhasil dihapus');
        return redirect()->back()->with('success', 'Event berhasil dihapus');
    }
}
