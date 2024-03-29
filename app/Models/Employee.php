<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['employeeId'];

    protected $fillable = ['employeeName', 'employeeEmail', 'employeePhone', 'employeeAddress', 'employeePassword', 'isAdmin'];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
