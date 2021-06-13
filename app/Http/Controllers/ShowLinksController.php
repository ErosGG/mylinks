<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class ShowLinksController extends Controller
{
    public function showLinks($user)
    {
        return view("show-links")
            ->with([
                "user" => $user,
                "links" => Link::all(),
            ]);
    }
}
