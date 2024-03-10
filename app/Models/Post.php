<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $primaryKey = 'post_id';

    protected $guarded = ['post_id'];

    protected $fillable = ['employeeId', 'post_title', 'post_slug', 'post_body'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employeeId', 'employeeId');
    }
}
