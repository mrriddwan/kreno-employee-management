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
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function roles()
    {
        return $this->belongsTo(Department_Roles::class, 'department_role_id');
    }

}
