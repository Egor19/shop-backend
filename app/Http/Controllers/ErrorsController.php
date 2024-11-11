<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorsController extends Controller
{
    public function forbidden()
    {
        return response()->view('errors.403', [], 403);
    }

    public function notFound()
    {
        return response()->view('errors.404', [], 404);
    }

    public function serverError()
    {
        return response()->view('errors.500', [], 500);
    }
}
