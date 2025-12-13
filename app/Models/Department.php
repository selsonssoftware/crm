<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Designation;

class Department extends Model {
    protected $table = 'departments';
    protected $primaryKey = 'department_id';

    protected $fillable = [
        'name',
        'status',
        'department_id',
    ];

    // Correct Relationship
    public function designations()
    {
        return $this->hasMany(Designation::class, 'department_id', 'department_id');
    }
}
