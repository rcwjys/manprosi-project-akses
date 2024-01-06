<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Medicine;

use function PHPUnit\Framework\isEmpty;

class UnitController extends Controller
{
    protected $medicineUnitData;

    public function index()
    {
        $medicineUnits = Unit::all();
        return view('admin.medicine-unit', compact('medicineUnits'));
    }

    public function getUnitForm()
    {
        return view('admin.add-unit');
    }

    public function storeUnitData(Request $req)
    {
        $validatedData = $req->validate([
            'medicineUnit' => ['required', 'unique:medicineunits']
        ]);

        Unit::create($validatedData);
        session()->flash('MedicineUnitSucessfulyCreated', 'Data satuan unit obat berhasil dibuat');
        return redirect(route('admin.medicine-unit'));
    }

    public function editUnitData(Request $req)
    {
        $medicineUnit = Unit::find($req->medicineUnitId);
        return view('admin.edit-form-unit', compact('medicineUnit'));
    }

    public function updateUnitData(Request $req)
    {
        $medicineUnit = Unit::find($req->medicineUnitId);
        $medicineUnit->medicineUnit = $req->medicineUnit;
        session()->flash('medicineUnitSuccessfulyUpdated', 'Dara satuan unit obat berhasil di perbaharui');
        $medicineUnit->save();
        return redirect(route('admin.medicine-unit'));
    }

    public function destroy(Request $req)
    {

        if (!count(Medicine::withCount('medicineClass')->get()) > 0) {

            $unitData = Unit::find($req->medicineUnitId);
            $unitData->delete();
            session()->flash('deleteUnitDataSuccessfuly', 'Data satuan unit data berhasil dihapus');

            return redirect(route('admin.medicine-unit'));
        } else {
            session()->flash('deleteUnitDataFailed', 'Proses Penghapusan Data Gagal, pastikan tidak ada lagi obat obat yang terkait.');

            return redirect(route('admin.medicine-unit'));
        }
    }
}
