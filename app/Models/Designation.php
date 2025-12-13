<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Designation extends Model {
    protected $table='designations';
    protected $primaryKey='designation_id';

    protected $fillable = [
        'title',
        'department_id',   // FIXED
        'status',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }
}




