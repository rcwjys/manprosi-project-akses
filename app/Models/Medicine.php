<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $table = 'medicines';

    protected $primaryKey = 'medicineId';

    protected $guarded = ['medicineId'];

    protected $fillable = ['medicineName', 'medicineStock', 'medicineInformation', 'expiredDate', 'medicinePeriod', 'recipeId', 'medicineUnitId', 'therapyClassId', 'subTherapyClassId', 'created_at', 'updated_at'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipeId', 'recipeId');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'medicineUnitId', 'medicineUnitId');
    }

    public function medicineClass()
    {
        return $this->belongsTo(ClassMedicine::class, 'therapyClassId', 'therapyClassId');
    }

    public function medicineSubClass()
    {
        return $this->belongsTo(SubClassMedicine::class, 'subTherapyClassId', 'subTherapyClassId');
    }
}
