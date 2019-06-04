<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function add()
    {
        echo 1;die;
        return view('brand.add');
    }
}
