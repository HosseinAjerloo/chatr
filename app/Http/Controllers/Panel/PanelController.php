<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        $config=Config::first();
        ;
        return view('panel.index',compact('config'));
    }
}
