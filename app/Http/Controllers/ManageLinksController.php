<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class ManageLinksController extends Controller
{
    public function index()
    {
        return view("manage-links")
            ->with("links", Link::all());
    }

    public function create(Request $request)
    {
        Link::create([
            "title" => $request->title,
            "url" => $request->url,
        ]);
        return view("manage-links")->with("links", Link::all());
    }

    public function details($link_id)
    {
        return view("link-details")
            ->with("link", Link::find($link_id))
            ->with("link_id", $link_id);
    }

    public function edit(Link $link)
    {
        return view("manage-links")->with("links", Link::all());
    }

    public function delete(Link $link)
    {
        $link->delete();
        return view("manage-links")->with("links", Link::all());
    }
}
