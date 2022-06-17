<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'name',
        'email',
        'address',
        'photo',
        'department'
    ];

    public function department()
    {
        return $this->hasOne(Department::class);
    }

    public function roles()
    {
        return $this->hasManyThrough(Role::class, Department::class, 'department_id', '');
    }
}
