<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowLinksController extends Controller
{
    public function showLinks($user)
    {
        return view("show-links", ["user" => $user]);
    }
}
