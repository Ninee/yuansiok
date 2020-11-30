<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function save(Request $request)
    {
        Visitor::create($request->all());
        return 'ok';
    }
}
