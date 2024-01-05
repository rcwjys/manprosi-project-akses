<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $primaryKey = 'medicineUnitId';
    protected $table = 'medicineunits';
    protected $guarded = ['medicineunits'];
    protected $fillable = ['medicineUnit', 'created_at', 'updated_at'];

    public function medicine()
    {
        return $this->hasMany(Medicine::class);
    }
}
