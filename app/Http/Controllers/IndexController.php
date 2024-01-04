<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $medicineData;

    public function __construct()
    {
        $this->medicineData = Medicine::all();
    }
    public static function index()
    {
        return view('customer.index');
    }

    public function accessMedicinePage()
    {
        $medicines = $this->medicineData;
        return view('customer.persediaan-obat', compact('medicines'));
    }
}
