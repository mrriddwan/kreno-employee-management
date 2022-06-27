<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'name',
        'description',
        'dept_photo',
        'dept_photo_path'
    ];

    public function employees()
    {
        return $this->belongsTo(Employee::class);
    }

    public function roles()
    {
        return $this->hasMany(Department_Roles::class);
    }
}
