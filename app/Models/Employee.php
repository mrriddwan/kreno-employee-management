<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Department_Roles;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'name',
        'email',
        'address',
        'employee_photo',
        'employee_photo_path',
        'department_id',
        'department_role_id'
    ];

    public function department()
    {
        return $this->belongsToMany(Department::class);
    }

    public function roles()
    {
        return $this->hasMany(Department_Roles::class);
    }

    public function getThumbAttribute($value)
    {
        return asset('storage/employee/' . $value);
    }
}
