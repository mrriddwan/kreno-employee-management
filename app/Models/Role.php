<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'role',
        'description'
    ];

    public function departments()
    {
        return $this->belongsTo(Department::class);
    }
}
