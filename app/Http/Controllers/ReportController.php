<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class ReportController extends Controller
{

    public function index()
    {
        $medicines = Medicine::all('medicineName', 'medicineStock', 'medicineInformation', 'expiredDate', 'medicinePeriod');
        return view('admin.reports', compact('medicines'));
    }
}
