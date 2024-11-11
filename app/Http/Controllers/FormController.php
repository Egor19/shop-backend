<?php

namespace App\Http\Controllers;


class FormController extends Controller
{
    public function __invoke()
    {
        return view('list.form');
    }
}
