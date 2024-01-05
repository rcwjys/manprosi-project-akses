<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\SubClassMedicine;
use App\Models\Unit;
use App\Models\ClassMedicine;
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
        $medicineRecipe = Recipe::all();
        $medicineClass = ClassMedicine::all();
        $medicineSubClass = SubClassMedicine::all();
        $medicineUnit = Unit::all();

        return view('admin.add-medicine', compact('medicineRecipe', 'medicineClass', 'medicineSubClass', 'medicineUnit'));
    }

    public function storeMedicineData(Request $req)
    {
        $validatedMedicineData = $req->validate([
            'medicineName' => ['required', 'unique:medicines'],
            'medicineStock' => ['required'],
            'medicineInformation' => ['required'],
            'expiredDate' => ['required'],
            'medicinePeriod' => ['required'],
            'recipeId' => ['required'],
            'medicineUnitId' => ['required'],
            'therapyClassId' => ['required'],
            'subTherapyClassId' => ['required']

        ]);

        Medicine::create($validatedMedicineData);

        session()->flash('medicineDataSuccessfulyCreated', 'Data obat telah berhasil dibuat');
        return redirect(route('admin.medicine-data'));
    }

    public function DetailMedicineData(Request $req)
    {
        $medicine = Medicine::find($req->medicineId);
        $medicineClass = Medicine::with('medicineClass')->find($req->medicineId);
        $medicineSubClass = Medicine::with('medicineSubClass')->find($req->medicineId);
        $recipe = medicine::with('recipe')->find($req->medicineId);
        $unit = Medicine::with('unit')->find($req->medicineId);

        return view('admin.medicine-details', compact('medicine', 'unit', 'recipe', 'medicineClass', 'medicineSubClass'));
    }

    public function editMedicineData(Request $req)
    {
        $medicine = Medicine::find($req->medicineId);
        $medicineClass = Medicine::with('medicineClass')->find($req->medicineId);
        $medicineSubClass = Medicine::with('medicineSubClass')->find($req->medicineId);
        $recipe = medicine::with('recipe')->find($req->medicineId);
        $unit = Medicine::with('unit')->find($req->medicineId);

        $recipeData = Recipe::all();
        $unitData = Unit::all();
        $classData = ClassMedicine::all();
        $subClassData = SubClassMedicine::all();

        return view('admin.edit-form-medicine', compact('medicine', 'unit', 'recipe', 'medicineClass', 'medicineSubClass', 'recipeData', 'unitData', 'classData', 'subClassData'));
    }

    public function updateMedicineData(Request $req)
    {
        $medicine = Medicine::find($req->medicineId);
        $medicine->medicinename = $req->medicineName;
        $medicine->medicineStock = $req->medicineStock;
        $medicine->medicineInformation = $req->medicineInformation;
        $medicine->expiredDate = $req->expiredDate;
        $medicine->recipeId = $req->recipeId;
        $medicine->medicineUnitId = $req->medicineUnitId;
        $medicine->therapyClassId = $req->therapyClassId;
        $medicine->subTherapyClassId = $req->subTherapyClassId;
        $medicine->save();

        session()->flash('updateMedicineDataSucessfuly', 'Data obat berhasil diperbaharui');

        return redirect(url('/medicine-data/details/' . $req->medicineId));
    }

    public function destroyMedicineData(Request $req)
    {
        $medicine = Medicine::find($req->medicineId);
        $medicine->delete();
        session()->flash('medicineSuccessfulyDeleted', 'Data obat berhasil untuk dihapus');
        return redirect(route('admin.medicine-data'));
    }
}
