<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class FormulariumController extends Controller
{
    public function index()
    {
        $data = Medicine::with([
            'recipe',
            'medicineClass',
            'medicineSubClass'
        ])->select()->get();

        return view('admin.formularium', compact('data'));
    }
}
