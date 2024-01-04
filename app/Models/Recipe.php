<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $primaryKey = 'recipeId';
    protected $table = 'medicinerecipes';
    protected $guarded = ['recipeId'];

    protected $fillable = ['recipe'];

    public function medicine()
    {
        return $this->hasMany(Medicine::class);
    }
}
