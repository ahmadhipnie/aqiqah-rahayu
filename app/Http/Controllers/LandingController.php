<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Events;
use App\Models\Produks;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Test;

class LandingController extends Controller
{
    public function index()
    {

        //mengambil data produk dari model Produks dengan 3 produk terbaru
        $produksTerbaru = Produks::orderBy('created_at', 'desc')->take(3)->get();

        //mengambil data events dari model dengan 3 produk terbaru
        $eventsTerbaru = Events::orderBy('created_at', 'desc')->take(3)->get();

        //mengambil data blog dari model dengan 3 produk terbaru
        $blogsTerbaru = Blogs::orderBy('created_at', 'desc')->take(3)->get();


        $testimonis = Testimoni::get();

        return view('index', compact('produksTerbaru', 'eventsTerbaru', 'blogsTerbaru', 'testimonis'));
    }

    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }

    public function harga()
    {
        $allProduks = Produks::orderBy('created_at', 'desc')->get();


        return view('harga', compact('allProduks'));
    }
    public function events()
    {

        $allEvents = Events::orderBy('created_at', 'desc')->get();
        return view('events', compact('allEvents'));
    }

    public function blog()
    {

        $allBlogs = Blogs::orderBy('created_at', 'desc')->get();
        return view('blog', compact('allBlogs'));
    }

    public function hubungiWhatsappNomor1()
    {
        return redirect()->away('https://api.whatsapp.com/send?phone=6285366620008&text=Halo%20Sapi%20Batam,%20dapat%20info%20dari%20website.%20Saya%20mau%20pesan%20');
    }
    public function hubungiWhatsappNomor2()
    {
        return redirect()->away('https://api.whatsapp.com/send?phone=6285366620009&text=Halo%20Sapi%20Batam,%20dapat%20info%20dari%20website.%20Saya%20mau%20pesan%20');
    }


    public function detailBlog($id)
    {
        $blog = Blogs::findOrFail($id);
        return view('detail_blog', compact('blog'));
    }

    public function detailProduk($id)
    {
        $produk = Produks::findOrFail($id);
        return view('detail_produk', compact('produk'));
    }

    public function detailEvents($id)
    {
        $event = Events::findOrFail($id);
        return view('detail_events', compact('event'));
    }
}
