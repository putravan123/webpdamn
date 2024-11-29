<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\BiografiDireksi;
use App\Models\CoreValue;
use App\Models\Slide;
use App\Models\Hukum;
use App\Models\KapasitasProduk;
use App\Models\Keuangan;
use App\Models\Manajemen;
use App\Models\Pelayanan;
use App\Models\PetaWilayah;
use App\Models\Registrasi;
use App\Models\SambunganLangganan;
use App\Models\Struktur;
use App\models\TeamMember;
use App\Models\Teknis;
use App\Models\TentangPdam;
use App\Models\VisiMisi;

class HomeController extends Controller
{

    public function home()
    {
        $slides = Slide::all();
        $abouts = About::all();
        $blogs = Blog::all();
        $teamMembers = TeamMember::all();
        
        return view('home.template.app', compact('slides','abouts','blogs', 'teamMembers'));
    }

    public function berita ()
    {
        $blogs = Blog::paginate(9);
        return view('home.template.berita', compact('blogs'));
    }

    public function contact ()
    {
        return view('home.template.contact');
    }

    public function visi()
    {
        $visiMisi = VisiMisi::paginate(9);
        return view('home.template.visis.visimisi', compact('visiMisi'));
    }
    public function struktur()
    {
        $strukturs = Struktur::all();
        return view('home.template.setruktur.struktur', compact('strukturs'));
    }
    public function hukum()
    {
        $hukum = Hukum::all();
        return view('home.template.hukum.hukum', compact('hukum'));
    }

    public function galeri()
    {
        $galeris = TeamMember::paginate(9);
        return view('home.template.galeris.galeri', compact('galeris'));
    }
    public function pelayanan()
    {
        $layanan = Pelayanan::paginate(9);
        return view('home.template.pelayanan.pelayanan', compact('layanan'));
    }

    public function teknis()
    {
        $teknis = Teknis::paginate(9);
        return view('home.template.teknis.tekinis', compact('teknis'));
    }

    public function manajemen()
    {
        $manajemen = Manajemen::paginate(9);
        return view('home.template.manajemen.manajemen', compact('manajemen'));
    }

    public function keuangan()
    {
        $keuangan = Keuangan::paginate(9);
        return view('home.template.keuangan.keuangan', compact('keuangan'));
    }
    public function registrasi()
    {
        $registrasis = Registrasi::paginate(9);
        return view('home.template.registrasi.registrasi', compact('registrasis'));
    }

    public function biografi_direksi()
    {
        $biografi_direksi = BiografiDireksi::paginate(9);
        return view('home.template.Biografi-Direksi.index', compact('biografi_direksi'));
    }
    public function tentang_pdam()
    {
        $tentangPdam = TentangPdam::paginate(9);
        return view('home.template.tentang-pdam.index', compact('tentangPdam'));
    }
    public function core_value()
    {
        $coreValue = CoreValue::paginate(9);
        return view('home.template.core-value.index', compact('coreValue'));
    }
    public function peta_wilayah()
    {
        $petaWilayahs = PetaWilayah::paginate(9);
        return view('home.template.petawilayah.index', compact('petaWilayahs'));
    }
    public function info_registrasi()
    {
        $infoRegsitrasi = CoreValue::paginate(9);
        return view('home.template.info_registrasi.index', compact('infoRegsitrasi'));
    }
    public function sambungan_langganan()
    {
        $sambunganLangganan = SambunganLangganan::paginate(9);
        return view('home.template.sambungan-langganan.index', compact('sambunganLangganan'));
    }
    public function kapasitas_produk()
    {
        $kapasitasProduk = KapasitasProduk::paginate(9);
        return view('home.template.kapasitas_produk.index', compact('kapasitasProduk'));
    }
    public function beritamore($id)
    {
        $blog = Blog::findOrFail($id);
        return view('home.template.berita.index', compact('blog'));
    }

}
