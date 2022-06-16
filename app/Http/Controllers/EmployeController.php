<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;

class EmployeController extends Controller
{
    //
    function show()
    {
        return Employe::all;
        // return view('list');
    }
}
