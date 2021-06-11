<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageLinksController extends Controller
{
    public function index()
    {
        return view("manage-links");
    }
}
