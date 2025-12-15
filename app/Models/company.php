<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // protected $fillable = [
    //     'company_id',
    //     'name',
    //     'address',
    //     'website',
    //     'email',
    //     'owner',
    //     'about',
    //     'phone',
    //     'industry',
    //     'image',
    // ];

    protected $table = 'companies';      // optional (Laravel already detects)

    protected $primaryKey = 'company_id';
    protected $guarded = [];
}



?>