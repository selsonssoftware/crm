<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    protected $fillable = [
        'interaction_id',
        'contact_id',
        'employee_id',
        'company_id',
        'interaction_type',
        'interaction_date',
        'notes',
    ];

    protected $table = 'interaction';      // optional (Laravel already detects)
    protected $primaryKey = 'intraction_id';   // ← VERY IMPORTANT
    public $incrementing = true;
    protected $keyType = 'int';
}



?>