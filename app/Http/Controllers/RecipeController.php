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

    public function getRecipeForm()
    {
        return view('admin.add-recipe');
    }

    public function storeRecipeData(Request $req)
    {
        $validatedRecipeData = $req->validate([
            'recipe' => ['unique:medicinerecipes', 'required'],
        ]);

        Recipe::create($validatedRecipeData);
        session()->flash('recipeDataSuccessfulyCreated', 'Pembuatan data resep berhasil');
        return redirect(route('admin.recipe'));
    }

    public function editRecipeData(Request $req)
    {
        $recipeData = Recipe::find($req->recipeId);
        return view('admin.edit-form-recipe', compact('recipeData'));
    }

    public function updateRecipeData(Request $req)
    {
        $recipe = Recipe::find($req->recipeId);
        $recipe->recipe = $req->recipe;
        $recipe->save();
        session()->flash('recipeDataSuccessfulyUpdated', 'Pembaharuan data resep berhasil');
        return redirect(route('admin.recipe'));
    }

    public function destroy(Request $req)
    {

        if (!count(Medicine::withCount('recipe')->get()) > 0) {
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
