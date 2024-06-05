<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class staticController extends Controller
{
    public  function home()
    {
        return redirect(route('product.index'));
    }
    public function about(Request  $request)
    {
        return view('about', ['langue' => $request->getPreferredLanguage()]);
    }
    public function contact()
    {
        return view('contact');
    }
}
