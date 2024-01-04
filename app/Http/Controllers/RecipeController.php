<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Models\Recipe;


class RecipeController extends Controller
{
    protected $recipeMedicineData;

    public function __construct()
    {
        $this->recipeMedicineData = Recipe::all();
    }

    public function index()
    {
        $recipes = $this->recipeMedicineData;
        return view('admin.recipe', compact('recipes'));
    }


    public function destroy(Request $req)
    {
        if (!is_null(Medicine::withCount('recipe')->get())) {
            $recipeData = Recipe::find($req->recipeId);
            $recipeData->delete();
            session()->flash('recipeSuccessfulyDeleted', 'Data resep berhasil di hapus');
            return redirect(route('admin.recipe'));
        } else {
            session()->flash('recipeFailedDeleted', 'Data resep tidak berhasil di hapus, pastikan sudah tidak memiliki keterkaitan dengan obat');
            return redirect(route('admin.recipe'));
        }
    }
}
