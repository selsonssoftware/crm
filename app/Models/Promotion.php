<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';

    protected $primaryKey = 'promotion_id';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = true;

    // Guard only primary key
    protected $guarded = ['promotion_id'];
}
