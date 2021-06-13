<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class ManageLinksController extends Controller
{
    public function index()
    {
        return view("manage-links")->with("links", Link::all());
    }

    public function create(Request $request)
    {
        Link::create([
            "title" => $request->title,
            "link" => $request->link,
        ]);
        return view("manage-links")->with("links", Link::all());
    }
}
