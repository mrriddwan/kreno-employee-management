<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentRole extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'department_id',
        'name',
        'description'
    ];

    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_roles');
    }

}
