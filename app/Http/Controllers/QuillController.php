<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuillController extends Controller
{
    public function index() {
        return view('quill');
    }

    public function store(Request $request) {
        dd($request->all());
    }

}
