<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use Inertia\Inertia;

class NoFoundController extends Controller
{
    public function index() {
        return Inertia::render('History/NoFound');
    }
}
