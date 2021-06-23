<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class ShowLinksController extends Controller
{
    public function show()
    {
        return view("show-links")
            ->with("links", Link::all());
    }
}
