<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdviserHomePageController extends Controller
{
    public function index()
    {
        return view('adviserpage.adviser.homepage');

    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function approval()
{
    return view('approval');
}

}