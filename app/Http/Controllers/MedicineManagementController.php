<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicine;

class MedicineManagementController extends Controller
{
    protected $medicineData;

    public function __construct()
    {
        $this->medicineData = Medicine::all();
    }

    public function index()
    {
        $medicines = $this->medicineData;
        return view('admin.medicine', compact('medicines'));
    }

    public function getMedicineForm()
    {
        // todo
    }

    public function storeMedicineData()
    {
        // todo
    }

    public function DetailMedicineData(Request $req)
    {
        $medicine = Medicine::find($req->medicineId)->first();
        return view('admin.medicine-details', compact('medicine'));
    }

    public function editMedicineData()
    {
        // todo
    }

    public function updateMedicineData()
    {
        // todo
    }

    public function destroyMedicineData()
    {
        // todo
    }
}
