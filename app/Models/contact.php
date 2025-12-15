<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'email',
    //     'phone',
    //     'position',
    //     'company_name',
    //     'dob',
    //     'source',
    //     'image'
    // ];

    protected $table = 'contacts';      

      
            protected $primaryKey = 'contact_id';
    protected $guarded = [];


}



?>