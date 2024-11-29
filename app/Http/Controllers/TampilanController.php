<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class TampilanController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function TampilanSlide()
    {
        $slides = Slide::all();
        return view('dashboard.slides.tampilan', compact('slides'));
    }
}
