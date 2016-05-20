<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function about()
    {

        $data = 'Iskander';
        $dat = 'Shamsudinov';

        return view('pages.about', compact('data', 'dat'));
    }

}
