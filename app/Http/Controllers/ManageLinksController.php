<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Link;

class ManageLinksController extends Controller
{
    public function show()
    {
        return view("show-links")
            ->with("links", Link::all());
    }

    public function index()
    {
        return view("manage-links")
            ->with("links", Link::all());
    }

    public function details(Link $link)
    {
        return view("link-details")
            ->with("link", $link);
    }

    public function create(Request $request)
    {
        $formRequest = $request->validate([
            "title" => "required",
            "url" => ["required", "url", "unique:links,url"],
        ], [
            "title.required" => "El camp títol és obligatori",
            "url.required" => "El camp URL és obligatori",
            "url.url" => "El camp URL ha de ser una URL vàlida",
            "url.unique" => "La URL no pot ser repetida",
        ]);
        Link::create([
            "title" => $formRequest["title"],
            "url" => $formRequest["url"],
        ]);
        return view("manage-links")->with("links", Link::all());
    }

    public function edit(Link $link)
    {
        return view("edit-link")->with("link", $link);
    }

    public function update(Link $link): RedirectResponse
    {
        $formRequest = request()->validate([
            "title" => "required",
            "url" => [
                "required",
                "url",
                Rule::unique("links", "url")->ignore($link->id)
            ],
        ], [
            "title.required" => "El camp títol és obligatori",
            "url.required" => "El camp URL és obligatori",
            "url.url" => "El camp URL ha de ser una URL vàlida",
            "url.unique" => "La URL no pot ser repetida",
        ]);
        $link->update($formRequest);
        return redirect()->route("link.details", ["link" => $link]);
    }

    public function delete(Link $link)
    {
        $link->delete();
        return redirect()->route("links.index", ["links" => Link::all()]);
    }
}
